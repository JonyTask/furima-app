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
    <form class="buy" action="/purchase/{{$item->id}}" method="post">
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
                    <select class="purchase__value" name="" id="payment">
                        <option value="1">コンビニ払い</option>
                        <option value="2">銀行振り込み</option>
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
                        <th>商品代金</th>
                        <td>¥ {{ number_format($item->price) }}</td>
                    </tr>
                    <tr>
                        <th>支払い方法</th>
                        <td id="pay_confirm">コンビニ払い</td>
                    </tr>
                </table>
            </div>
            @csrf
            @if ($item->sold())
            <button class="btn disable" disabled>売り切れました</button>
            @elseif ($item->mine())
            <button class="btn disable" disabled>購入できません</button>
            @else
            <button type="submit" class="btn">購入する</button>
            @endif
        </div>
    </form>
</div>
<script>
    const select = document.getElementById('payment');
    const change_destination_btn = document.getElementById('purchase__update');
    const set_destination_btn = document.getElementById('destination__setting');

    select.addEventListener('change', () => {
        const target = document.getElementById('pay_confirm');
        var index = select.selectedIndex;
        var txt = select.options[index].label;
        target.textContent = txt;
    });

    change_destination_btn.addEventListener('click', (e) => {
        e.target.style.display = "none";
        set_destination_btn.style.display = "unset";
        var inputs = document.getElementsByClassName('input_destination');
        for (const input of inputs) {
            input.readOnly = false;
        }
        inputs[0].focus();
    });

    set_destination_btn.addEventListener('click', (e) => {
        e.target.style.display = "none";
        change_destination_btn.style.display = "unset";
        var inputs = document.getElementsByClassName('input_destination');
        for (const input of inputs) {
            input.readOnly = true;
        }
    });
</script>
@endsection