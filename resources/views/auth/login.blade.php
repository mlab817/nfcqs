@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('/img/da-logo.png') }}" class="login-logo" />
        </div>
        <div class="system-name">
            <h2>NFCQS</h2>
        </div>
        <div class="login-wrapper">
            @if (count($errors) > 0)
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-angle-right"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="alert">
                    <strong><i class="fas fa-lock"></i> Login Form</strong>
                </div>
            @endif
            <form method="POST" action="{{ url('/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="on" />
                <input type="password" name="password" placeholder="Password" autocomplete="off" />
                <input type="submit" value="Sign in" />
            </form>
        </div>
    </div>
@endsection
