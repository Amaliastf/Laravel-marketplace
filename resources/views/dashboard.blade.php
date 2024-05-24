@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p>Welcome, {{ Auth::user()->full_name }}!</p>
                    <p>Your email address: {{ Auth::user()->email }}</p>
                    <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                    <a href="{{ route('products.index') }}" class="btn btn-primary">PRODUCTS</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
