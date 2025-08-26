<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function checkout(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->payment_method);

            $user->charge(
                $product->price * 100,
                $request->payment_method,
                [
                    'currency' => 'inr',
                    'payment_method_types' => ['card'],
                    'description' => $product->name,
                ]
            );

            return redirect()->route('products.index')->with('success', 'Payment successful for ' . $product->name);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
