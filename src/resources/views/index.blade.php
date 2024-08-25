@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="contacts/confirm" method="post">
    @csrf
    <!-- お名前 -->
    <div class="form-group">
       <label for="first_name">お名前 <span class="required">※</span></label>
       <div class="name-fields">
           <input type="text" id="first_name" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}" class="@error('first_name') is-invalid @enderror">
           @error('first_name')
               <div class="error">{{ $message }}</div>
           @enderror
           <input type="text" id="last_name" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}" class="@error('last_name') is-invalid @enderror">
           @error('last_name')
               <div class="error">{{ $message }}</div>
           @enderror
       </div>
    </div>

    <!-- 性別 -->
    <div class="form-group">
      <label for="gender">性別 <span class="required">※</span></label>
      <div class="radio-group">
        <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
        <label for="male">男性</label>
        <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
        <label for="female">女性</label>
        <input type="radio" id="other" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
        <label for="other">その他</label>
      </div>
      @error('gender')
          <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <!-- メールアドレス -->
    <div class="form-group">
      <label for="email">メールアドレス <span class="required">※</span></label>
      <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
      @error('email')
          <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <!-- 電話番号 -->
    <div class="form-group">
      <label for="tel">電話番号 <span class="required">※</span></label>
      <div class="tel-inputs">
        <input type="text" id="tel1" name="tel1" placeholder="080" value="{{ old('tel1') }}" class="@error('tel1') is-invalid @enderror">
        <span class="separator">-</span>
        <input type="text" id="tel2" name="tel2" placeholder="1234" value="{{ old('tel2') }}" class="@error('tel2') is-invalid @enderror">
        <span class="separator">-</span>
        <input type="text" id="tel3" name="tel3" placeholder="5678" value="{{ old('tel3') }}" class="@error('tel3') is-invalid @enderror">
      </div>
      @error('tel')
          <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <!-- 住所 -->
    <div class="form-group">
      <label for="address">住所 <span class="required">※</span></label>
      <input type="text" id="address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" class="@error('address') is-invalid @enderror">
      @error('address')
          <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <!-- 建物名 -->
    <div class="form-group">
      <label for="building">建物名</label>
      <input type="text" id="building" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" class="@error('building') is-invalid @enderror">
    </div>

    <!-- お問い合わせの種類 -->
    <div class="form-group">
      <label for="category">お問い合わせの種類 <span class="required">※</span></label>
      <select id="category" name="category" class="@error('category') is-invalid @enderror">
        <option value="">選択してください</option>
        <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>商品について</option>
        <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>サービスについて</option>
        <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>その他</option>
      </select>
      @error('category')
          <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <!-- お問い合わせ内容 -->
    <div class="form-group">
      <label for="message">お問い合わせ内容 <span class="required">※</span></label>
      <textarea id="message" name="message" placeholder="お問い合わせ内容をご記入ください" class="@error('message') is-invalid @enderror">{{ old('message') }}</textarea>
      @error('message')
          <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <button type="submit" class="submit-button">確認画面</button>
    </div>
  </form>
</div>

@endsection
