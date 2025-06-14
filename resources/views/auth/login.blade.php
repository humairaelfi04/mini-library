@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">Login Admin</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100" type="submit">Login</button>
    </form>
</div>
@endsection
