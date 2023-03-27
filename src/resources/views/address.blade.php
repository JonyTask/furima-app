@extends('layouts.default')

<!-- タイトル -->
@section('title','住所変更')

<!-- 本体 -->
@section('content')

@include('components.header')
<form action="#" method="post" class="address center">
    <h1 class="page__title">住所の変更</h1>
    <label for="postcode" class="entry__name">郵便番号</label>
    <input id="postcode" type="text" class="input">
    <label for="address" class="entry__name">住所</label>
    <input id="address" type="text" class="input">
    <label for="building" class="entry__name">建物名</label>
    <input id="building" type="text" class="input">
    <button class="btn btn--big">更新する</button>
</form>
@endsection
