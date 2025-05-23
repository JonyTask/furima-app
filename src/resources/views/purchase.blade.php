@extends('layouts.default')

<!-- タイトル -->
@section('title','購入手続き')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/purchase.css')  }}">
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="container">
    <form class="buy" id="stripe-form" action="/purchase/{{$item->id}}" method="post">
        <div class="buy__left">
            <div class="item">
                <div class="item__img">
                    <img src="{{ \Storage::url($item->img_url) }}" alt="">
                </div>
                <div class="item__info">
                    <h3 class="item__name">{{$item->name}}</h3>
                    <p class="item__price">¥ {{number_format($item->price)}}</p>
                </div>
            </div>
            <div class="purchases">
                @component('components.purchase-method')
                @endcomponent

                @component('components.set-destination', ['user' => $user])
                @endcomponent
            </div>
        </div>
        <div class="buy__right">
            @component('components.info-confirm-table', ['item' => $item])
            @endcomponent
            
            @csrf
            @if ($item->sold())
            <button class="btn disable" disabled>売り切れました</button>
            @elseif ($item->mine())
            <button class="btn disable" disabled>購入できません</button>
            @else
            <button id="purchase_btn" class="btn">購入する</button>
            @endif
        </div>
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="{{ asset('js/purchase.js') }}"></script>
@endsection