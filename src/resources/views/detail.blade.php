@extends('layouts.default')

<!-- タイトル -->
@section('title','商品詳細ページ')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/detail.css')  }}">
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="container">
    <div class="item">
        @if ($item->sold())
        <div class="item__img sold">
            <img src="{{ \Storage::url($item->img_url) }}" alt="商品画像">
        </div>
        @else
        <div class="item__img">
            <img src="{{ \Storage::url($item->img_url) }}" alt="商品画像">
        </div>
        @endif
        <div class="item__info" id="scroll__item__info">
            <h2 class="item__name">{{$item->name}}</h2>
            <p class="item__price">¥ {{number_format($item->price)}}</p>

            @component('components.like-and-comment', ['item' => $item])
            @endcomponent

            @component('components.purchase-proceed-link', ['item' => $item])
            @endcomponent

            @component('components.item-info', ['item' => $item])
            @endcomponent

            @component('components.comment-form', ['item' => $item])
            @endcomponent
        </div>
    </div>
</div>
@endsection