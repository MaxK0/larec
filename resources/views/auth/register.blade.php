@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="page-wrapper">
        <div class="container auth-container">
            <div class="register-form">
                <h1>Зарегистрироваться</h1>
                <form class="input_form" id="registerForm" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <input class="input-main form-control" type="text" id="name" name="name" placeholder="Имя" required>
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input class="input-main form-control" type="email" id="email" name="email" placeholder="Email"
                           required>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input class="input-main form-control" type="password" id="password" name="password"
                           placeholder="Пароль" required>
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input class="input-main form-control" type="password" id="password_confirmation"
                           name="password_confirmation" placeholder="Подтвердите пароль" required>
                    <button type="submit" class="input_button">Зарегистрировать</button>
                </form>
                <p class="link-form">Есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
            </div>
        </div>

    </div>
@endsection
