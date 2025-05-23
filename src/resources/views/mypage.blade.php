@extends('layouts.default')

<!-- タイトル -->
@section('title','マイページ')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css')  }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}">
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="container">
    <div class="user">
        <div class="user__info">
            @component('components.user-image', ['profile' => $profile])
            @endcomponent
            <p class="user__name">{{ $user_name }}</p>
        </div>
        <div class="mypage__user--btn">
            <a class="btn2" href="/mypage/profile">プロフィールを編集</a>
        </div>
    </div>
    <div class="border">
        <ul class="border__list">
            <li><a href="/mypage?page=sell">出品した商品</a></li>
            <li><a href="/mypage?page=buy">購入した商品</a></li>
        </ul>
    </div>
    <div class="items">
        @foreach ($items as $item)
            @component('components.item-card', ['item' => $item])
            @endcomponent
        @endforeach
    </div>
</div>
@endsection