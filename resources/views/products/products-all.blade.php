@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">PRODUCTS</h2>
                <a href="{{ route('products.index') }}" class="btn btn-success fw-bold">Add Product</a>
            </div>
            <div class="row row-gap-4">
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="card bg-white w-100">
                            <img class="rounded" src="{{ $product->image }}" alt="{{ $product->name }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between my-2">
                                    <p class="card-title fw-bold my-auto" style="font-size: 24px">
                                        {{ $product->name }}
                                    </p>
                                    @if ($product->condition == 'Baru')
                                        <p class="my-auto rounded py-1 bg-success px-2 fw-semibold" style="font-size: 16px">
                                            {{ $product->condition }}
                                        </p>
                                    @else
                                        <p class="my-auto rounded py-1 bg-warning px-2 fw-semibold" style="font-size: 16px">
                                            {{ $product->condition }}
                                        </p>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="my-auto rounded py-1 bg-success px-2 text-white fw-semibold" style="font-size: 16px">
                                        {{ $product->stock }}
                                    </p>
                                    <p class="my-auto rounded py-1 bg-info px-2 fw-semibold" style="font-size: 16px">
                                        Rp. {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                    <p class="my-auto rounded py-1 bg-secondary text-white px-2 fw-semibold" style="font-size: 16px">
                                        {{ $product->weight }} gr
                                    </p>
                                </div>
                                <p class="card-text" style="overflow: hidden;max-width: 400px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin: 10px auto;">
                                    {{ $product->description }}
                                </p>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-primary w-100 mb-2">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
