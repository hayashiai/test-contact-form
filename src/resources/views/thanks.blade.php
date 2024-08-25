@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks-container">
    <h2>Thank you</h2>
    <p>お問い合わせありがとうございました</p>
    <a href="{{ route('index') }}" class="home-button">HOME</a>
</div>
@endsection