@extends('layouts.default')

<!-- タイトル -->
@section('title','購入手続き')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/purchase.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="container">
<div class="buy">
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
                    <!-- <a class="purchase__update" href="#">変更する</a> -->
                </div>
                <select class="purchase__value" name="" id="payment">
                    <option value="1">コンビニ払い</option>
                    <option value="2">銀行振り込み</option>
                </select>
            </div>
            <div class="purchase">
                <div class="purchase__flex">
                    <h3 class="purchase__title">配送先</h3>
                    <a class="purchase__update" href="/purchase/address/{{$item->id}}">変更する</a>
                </div>
                <div class="purchase__value">
                    <p>〒 {{$user->profile->postcode}}</p>
                    <p>{{$user->profile->address}}</p>
                    @if (isset($user->profile->building))
                    <p>{{$user->profile->building}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="buy__right">
        <div class="buy__info">
            <table>
                <tr>
                    <th>商品代金</th>
                    <td>¥ {{ number_format($item->price) }}</td>
                </tr>
                <tr>
                    <th>支払い方法</th>
                    <td id="pay_confirm">コンビニ払い</td>
                </tr>
            </table>
        </div>
        <form action="/purchase/{{$item->id}}" method="post">
            @csrf
            @if ($item->sold())
            <button class="btn disable" disabled>売り切れました</button>
            @elseif ($item->mine())
            <button class="btn disable" disabled>購入できません</button>
            @else
            <button class="btn">購入する</button>
            @endif
        </form>
    </div>
</div>
</div>
<script>

var select = document.getElementById('payment');
select.addEventListener('change', () => {
    const target = document.getElementById('pay_confirm');
    var index = select.selectedIndex;
    var txt = select.options[index].label;
    target.textContent = txt;
});

</script>
@endsection
