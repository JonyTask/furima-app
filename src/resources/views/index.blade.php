@extends('layouts.default')

<!-- タイトル -->
@section('title','トップページ')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css')  }}">
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="border">
    <ul class="border__list">
        <li><a href="/">おすすめ</a></li>
        <li><a href="/?page=mylist">マイリスト</a></li>
    </ul>
</div>
<div class="container">
    <div class="items">
        @foreach ($items as $item)
            @component('components.item-card', ['item' => $item])
            @endcomponent
        @endforeach
    </div>
</div>
@endsection