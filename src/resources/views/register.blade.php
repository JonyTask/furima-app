@extends('layouts.default')

<!-- タイトル -->
@section('title','会員登録')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/authentication.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<form action="#" method="post" class="authenticate center">
    <h1 class="page__title">会員登録</h1>
    <label for="name" class="entry__name">ユーザ名</label>
    <input id="name" type="email" class="input">
    <label for="mai;" class="entry__name">メールアドレス</label>
    <input id="mail" type="email" class="input">
    <label for="password" class="entry__name">パスワード</label>
    <input id="password" type="password" class="input">
    <button class="btn btn--big">登録する</button>
    <a href="#" class="link">ログインはこちら</a>
</form>
@endsection
