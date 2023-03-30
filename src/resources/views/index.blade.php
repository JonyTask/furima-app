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
        <li><a href="/">おすすめ</a></li>
        <li><a href="/?page=mylist">マイリスト</a></li>
    </ul>
</div>
<div class="container">
    <div class="items">
        @foreach ($items as $item)
            <div class="item">
                <a href="/item/{{$item->id}}">
                @if ($item->sold())
                    <div class="item__img sold">
                        <img src="{{ \Storage::url($item->img_url) }}" alt="商品画像">
                    </div>
                @else
                    <div class="item__img">
                        <img src="{{ \Storage::url($item->img_url) }}" alt="商品画像">
                    </div>
                @endif
                    <p class="item__name">{{$item->name}}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
