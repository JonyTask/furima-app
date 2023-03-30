@extends('layouts.default')

<!-- タイトル -->
@section('title','住所変更')

<!-- 本体 -->
@section('content')

@include('components.header')
<form action="/purchase/address/{{$item_id}}" method="post" class="address center">
    @csrf
    <h1 class="page__title">住所の変更</h1>
    <label for="postcode" class="entry__name">郵便番号</label>
    <input name="postcode" id="postcode" type="text" class="input" value="{{$user->profile->postcode}}" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
    <div class="form__error">
        @error('postcode')
            {{ $message }}
        @enderror
    </div>
    <label for="address" class="entry__name">住所</label>
    <input name="address" id="address" type="text" class="input" value="{{$user->profile->address}}">
    <div class="form__error">
        @error('address')
            {{ $message }}
        @enderror
    </div>
    <label for="building" class="entry__name">建物名</label>
    <input name="building" id="building" type="text" class="input" value="{{$user->profile->building}}">
    <button class="btn btn--big">更新する</button>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.zip2addr.js"></script>
@endsection
