@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="mb-3">
                <a href="{{ route('products.all') }}" class="btn btn-primary">Products</a>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <h4>User Information</h4>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Gender:</strong> {{ $user->gender }}</p>
                    <p><strong>Age:</strong> {{ $user->age }}</p>
                    <p><strong>Birth Date:</strong> {{ $user->birth_date }}</p>
                    <p><strong>Address:</strong> {{ $user->address }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
