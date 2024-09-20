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
                <div class="purchase">
                    <div class="purchase__flex">
                        <h3 class="purchase__title">支払い方法</h3>
                    </div>
                    <select class="purchase__value" id="payment">
                        <option value="1">コンビニ払い</option>
                        <option value="2">銀行振り込み</option>
                        <option value="3">クレジットカード払い</option>
                    </select>
                </div>
                <div class="purchase">
                    <div class="purchase__flex">
                        <h3 class="purchase__title">配送先</h3>
                        <button type="button" id="purchase__update">変更する</button>
                    </div>
                    <div class="purchase__value">
                        <label>〒 <input class="input_destination" name="destination_postcode" value="{{ $user->profile->postcode }}" readonly></label><br>
                        <input class="input_destination" name="destination_address" value="{{ $user->profile->address }}" readonly><br>
                        @if (isset($user->profile->building))
                        <input class="input_destination" name="destination_building" value="{{ $user->profile->building }}" readonly>
                        @endif
                    </div>
                    <div class="setting__flex">
                        <button type="button" id="destination__setting">変更完了</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="buy__right">
            <div class="buy__info">
                <table>
                    <tr>
                        <th class="table__header">商品代金</th>
                        <td id="item__price" class="table__data" value="{{ number_format($item->price) }}">¥ {{ number_format($item->price) }}</td>
                    </tr>
                    <tr>
                        <th class="table__header">支払い方法</th>
                        <td id="pay_confirm" class="table__data">コンビニ払い</td>
                    </tr>
                </table>
            </div>
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