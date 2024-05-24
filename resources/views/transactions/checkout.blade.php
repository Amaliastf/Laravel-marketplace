@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>

                <div class="card-body">
                    @if(isset($transaction))
                        <p><strong>No. Invoice:</strong> {{ $transaction->no_invoice }}</p>
                        <p><strong>Admin Fee:</strong> Rp. {{ number_format($transaction->admin_fee, 0, ',', '.') }}</p>
                        <p><strong>Kode Unik:</strong> {{ $transaction->kode_unik }}</p>
                        <p><strong>Total:</strong> Rp. {{ number_format($transaction->total, 0, ',', '.') }}</p>
                        <p><strong>Metode Pembayaran:</strong> {{ $transaction->metode_pembayaran }}</p>
                        <p><strong>Status:</strong> {{ $transaction->status }}</p>
                        <p><strong>Expired At:</strong> {{ $transaction->expired_at }}</p>
                    @else
                        <p>Transaction not found for this product.</p>
                    @endif
                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
