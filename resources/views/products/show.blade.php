@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">{{ $product->name }}</h2>
    <p class="text-muted mb-4">{{ $product->description }}</p>
    <h5 class="mb-4">Price: ₹{{ $product->price }}</h5>


    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif

    <form id="payment-form" method="POST" action="{{ route('products.checkout', $product->id) }}" class="p-6 border rounded shadow-sm bg-white">
        @csrf
        <input type="hidden" name="payment_method" id="payment_method">

        <div class="form-group mb-3">
            <label for="card-element" class="form-label">Card Details</label>
            <div id="card-element" class="form-control p-4"></div>
        </div>

        <button id="pay-button" class="btn btn-success py-2">
            <i class="fas fa-lock me-2"></i> Pay Now
        </button>
    </form>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('payment-form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const {paymentMethod, error} = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
        });


        if (error) {
            alert(error.message);
        } else {
            document.getElementById('payment_method').value = paymentMethod.id;
            form.submit();
        }
    });
</script>
@endsection
