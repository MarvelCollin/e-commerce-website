@extends('components.app')
<link rel="stylesheet" href="{{ asset('css/navfoot.css') }}">

@section('container')
    <div class="container">
        <div class="navbar">
            <divx class="nav-items">
                <img src="{{ asset('assets/shop.png') }}" alt="">
                <p>urgay</p>
            </divx>
            <div class="nav-items">
                <input type="text" placeholder="Search">
                <button>Search</button>
            </div>
            @auth
                <div class="nav-items">
                    <img src="" alt="">
                    <p>Your Name</p>
                </div>
            @else
                <div class="nav-items">
                    <a href="{{ route('loginView') }}">Login</a>
                    <a href="{{ route('registerView') }}">Register</a>
                </div>
            @endauth
        </div>
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">
            This is the hell footer
        </div>
    </div>
@endsection
