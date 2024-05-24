@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">{{ __('Add Product') }}</a>
                    <a href="{{ route('products.export') }}" class="btn btn-success mb-3">{{ __('Export Data') }}</a>
                    <a href="{{ route('profile.show') }}" class="btn btn-info mb-3">{{ __('Lihat Profil') }}</a>
                    <div class="mb-3">
                        <form action="{{ route('products.index') }}" method="GET" class="form-inline" style="width: 30%;">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search" style=" margin-bottom: 2%;">
                        <select name="perPage" class="form-control mr-2">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                        </form>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Weight') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Condition') }}</th>
                                <th>{{ __('Stock') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><img src="{{ $product->image }}" alt="{{ $product->name }}" width="50"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->weight }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->condition }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
