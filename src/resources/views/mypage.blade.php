@extends('layouts.default')

<!-- タイトル -->
@section('title','マイページ')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css')  }}" >
<link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="container">
    <div class="user">
            <div class="user__info">
                <div class="user__img">
                    @if (isset($user->profile->img_url))
                        <img class="user__icon" src="{{ \Storage::url($user->profile->img_url) }}" alt="">
                    @else
                        <img id="myImage" class="user__icon" src="{{ asset('img/icon.png') }}" alt="">
                    @endif
                </div>
                <p class="user__name">{{$user->name}}</p>
            </div>
            <div class="mypage__user--btn">
            <a class="btn2" href="/mypage/profile">プロフィールを編集</a>
            </div>
    </div>
    <div class="border">
        <ul class="border__list">
            <li><a href="#">出品した商品</a></li>
            <li><a href="#">購入した商品</a></li>
        </ul>
    </div>
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
