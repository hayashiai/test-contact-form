@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<header>
    <a href="{{ route('register') }}" class="register-button">register</a>
</header>
<main>
    <div class="login-container">
        <h2>Login</h2>
        <div class="login-form">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           placeholder="例: test@example.com" class="@error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" placeholder="例: coachtechno6"
                           class="@error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit">ログイン</button>

                @if ($errors->has('login_error'))
                    <div class="error">{{ $errors->first('login_error') }}</div>
                @endif
            </form>
        </div>
    </div>
</main>
@endsection
