@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil Pengguna</div>

                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $user->name }}</p>
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
