@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($product->description, 80) }}</p>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="text-success mb-0">₹{{ number_format($product->price, 2) }}</h5>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm px-3">
                                <i class="fas fa-shopping-cart me-1"></i> Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
