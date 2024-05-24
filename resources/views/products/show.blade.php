@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <p><strong>Condition:</strong> {{ $product->condition }}</p>
                            <p><strong>Stock:</strong> {{ $product->stock }}</p>
                            <p><strong>Price:</strong> Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p><strong>Weight:</strong> {{ $product->weight }} gr</p>
                            <p><strong>Description:</strong> {{ $product->description }}</p>
                            <a href="{{ route('products.checkout', $product) }}" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
