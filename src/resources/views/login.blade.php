@extends('layouts.default')

<!-- タイトル -->
@section('title','ログイン')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/authentication.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<form action="#" method="post" class="authenticate center">
    <h1 class="page__title">ログイン</h1>
    <label for="mail" class="entry__name">メールアドレス</label>
    <input id="mail" type="email" class="input">
    <label for="password" class="entry__name">パスワード</label>
    <input id="password" type="password" class="input">
    <button class="btn btn--big">ログインする</button>
    <a href="#" class="link">会員登録はこちら</a>
</form>
@endsection
