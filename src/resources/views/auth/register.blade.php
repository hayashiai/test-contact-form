@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <header>
        <a href="{{ route('login') }}" class="login-button">login</a>
    </header>
    <main>
      <div class="register-container">
         <h2>Register</h2>
         <div class="register-form">
         <form class="form" action="/register" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" name="name" id="name" placeholder="例: 山田 太郎" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" required>

                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" placeholder="例: test@example.com" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" placeholder="例: coachtechno6" value="{{ old('password') }}" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" required>

                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit">登録</button>
            </form>
        </div>
    </div>
@endsection