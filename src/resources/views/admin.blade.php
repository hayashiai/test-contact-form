@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <header>
        <!--<h1>FashionablyLate</h1>-->
        <a href="{{ route('logout') }}">logout</a>
    </header>
    <main>
        <h2>Admin</h2>
        <form method="GET" action="{{ route('admin.search') }}" class="search-form">
            <input type="text" name="keyword" placeholder="名前かメールアドレスを入力してください">
            <select name="gender">
                <option value="">性別</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
            </select>
            <select name="category">
                <option value="">お問い合わせの種類</option>
                <!-- その他のオプションをここに追加 -->
            </select>
            <input type="date" name="date" value="{{ request('date') }}">

            <button type="submit">検索</button>
            <button type="reset">リセット</button>
        </form>

        <button class="export-button">エクスポート</button>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category }}</td>
                    <td><a href="{{ route('admin.detail', $contact->id) }}" class="detail-link">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </main>
</div>
@endsection
