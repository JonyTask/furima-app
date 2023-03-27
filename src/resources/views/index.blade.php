@extends('layouts.default')

<!-- タイトル -->
@section('title','トップページ')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="border">
    <ul class="border__list">
        <li><a href="#">おすすめ</a></li>
        <li><a href="#">マイリスト</a></li>
    </ul>
</div>
<div class="container">
    <div class="items">
        @for ($i = 0; $i < 18; $i++)
        <div class="item">
            <a href="#">
                <div class="item__img">
                    <img src="" alt="商品画像">
                </div>
                <p class="item__name">商品名</p>
            <a href="#">
        </div>
        @endfor
    </div>
</div>
@endsection
