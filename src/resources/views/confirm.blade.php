@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-container">
    <h2>Confirm</h2>
    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>{{ $first_name }} {{ $last_name }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>{{ $gender }}</td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $tel }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $address }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $building }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $category }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $message }}</td>
        </tr>
    </table>
    <form action="{{ route('thanks') }}" method="post">
        @csrf
        <div class="confirm-buttons">
          <button type="submit" class="submit-button">送信</button>
        </div>
    </form>

    <form action="{{ route('index') }}" method="get">
        <div class="confirm-buttons">
          <button type="submit" class="edit-button">修正</button>
        </div>
    </form>
</div>
@endsection