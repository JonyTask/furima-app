@extends('layouts.default')

<!-- タイトル -->
@section('title','プロフィール設定')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<form action="/mypage/profile" method="post" class="profile center">
    @csrf
    <h1 class="page__title">プロフィール設定</h1>
    <div class="user">
        <div class="user__img">
            <img src="#" alt="">
        </div>
        <div class="profile__user--btn">
            <label class="btn2">
            画像を選択する
            <input class="btn2--input" type="file" name="test" accept="image/png, image/jpeg">
            </label>
        </div>
    </div>
    <label for="name" class="entry__name">ユーザ名</label>
    <input name="name" id="name" type="text" class="input">
    <div class="form__error">
        @error('name')
            {{ $message }}
        @enderror
    </div>

    <label for="postcode" class="entry__name">郵便番号</label>
    <input name="postcode" id="postcode" type="text" class="input">
    <div class="form__error">
        @error('postcode')
            {{ $message }}
        @enderror
    </div>

    <label for="address" class="entry__name">住所</label>
    <input name="address" id="address" type="text" class="input">
    <div class="form__error">
        @error('address')
            {{ $message }}
        @enderror
    </div>

    <label for="building" class="entry__name">建物名</label>
    <input name="building" id="building" type="text" class="input">
    <button class="btn btn--big">更新する</button>
</form>
@endsection
