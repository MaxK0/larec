@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <div class="page-wrapper">
        <div class="container auth-container">
            <div class="login-form">
                <h1>Вход</h1>
                <form class="input_form" id="loginForm" action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <input class="input-main form-control" type="email" id="email" name="email" placeholder="Email" required>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="password" class="input-main form-control" id="password" name="password" placeholder="Пароль" required>
                    <button class="input_button" type="submit">Войти</button>
                </form>
                <p class="link-form">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
            </div>
        </div>
    </div>
@endsection
