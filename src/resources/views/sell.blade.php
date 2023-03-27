@extends('layouts.default')

@section('title','出品ページ')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/sell.css')  }}" >
@endsection

@section('content')
@include('components.header')
<form action="#" method="post" class="sell center">
    <h1 class="page__title">商品の出品</h1>
    <p class="entry__name">商品画像</p>
    <div class="sell__img">
        <label class="btn2">
            画像を選択する
            <input class="btn2--input" type="file" name="test" accept="image/png, image/jpeg">
        </label>
    </div>
    <h2 class="heading__name">商品の詳細</h2>
    <p for="category" class="entry__name">カテゴリー</p>
    <div class="sell__categories">
        @for ($i = 0; $i < 10; $i++)
        <div class="sell__category">
            <input id="check{{$i}}" type="checkbox" class="sell__check" value="check{{$i}}">
            <label for="check{{$i}}" class="sell__check-label">チェック{{$i}}</label>
        </div>
        @endfor
    </div>
    <label for="status" class="entry__name">商品の状態</label>
    <select id="status" class="sell__select input">
        <option hidden>選択してください</option>
        <option value="1">良好</option>
        <option value="2">傷あり</option>
    </select> 
    <h2 class="heading__name">商品名と説明</h2>
    <label for="name" class="entry__name">商品名</label>
    <input id="name" type="text" class="input">
    <label for="description" class="entry__name">説明</label>
    <textarea id="description" class="input textarea"></textarea>
    <h2 class="heading__name price">販売価格</h2>
    <label for="price" class="entry__name">販売価格</label>
    <input id="price" type="number" class="input">
    <button class="btn btn--big">出品する</button>
</form>



@endsection