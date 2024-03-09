@extends('components.app')

@section('title', 'Register')
<link rel="stylesheet" href="{{ asset('css/global.css') }}">
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

@section('container')
    <div class="content">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <p>Register</p>
            <p>Google</p>

            <input type="text" placeholder="username" name="username" required>
            <input type="email" placeholder="email" name="email" required>
            <input type="password" placeholder="password" name="password" required>

            <button type="submit">Register</button>
        </form>
    </div>
@endsection
