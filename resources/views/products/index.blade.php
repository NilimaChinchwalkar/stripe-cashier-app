@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h2>Products</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <h5>₹{{ $product->price }}</h5>
                        <a href="" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
