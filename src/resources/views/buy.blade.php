@extends('layouts.default')

<!-- タイトル -->
@section('title','購入手続き')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/buy.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="container">
<div class="buy">
    <div class="buy__left">
        <div class="item">
            <div class="item__img">
                <img src="#" alt="">
            </div>
            <div class="item__info">
                <h3 class="item__name">商品名</h3>
                <p class="item__price">値段</p>
            </div>
        </div>
        <div class="purchases">
            <div class="purchase">
                <div class="purchase__flex">
                    <h3 class="purchase__title">支払い方法</h3>
                    <a class="purchase__update" href="#">変更する</a>
                </div>
                <p class="purchase__value">コンビニ払い</p>
            </div>
            <div class="purchase">
                <div class="purchase__flex">
                    <h3 class="purchase__title">配送先</h3>
                    <a class="purchase__update" href="#">変更する</a>
                </div>
                <div class="purchase__value">
                    <p>東京都港区芝</p>
                    <p>東京都港区芝</p>
                    <p>東京都港区芝</p>
                </div>
            </div>
        </div>
    </div>
    <div class="buy__right">
        <div class="buy__info">
            <table>
                <tr>
                    <th>商品代金</th>
                    <td>47,000</td>
                </tr>
                <tr>
                    <th>支払い方法</th>
                    <td>コンビニ払い</td>
                </tr>
            </table>
        </div>
        <form action="#" method="post">
            <button class="btn">購入する</button>
        </form>
    </div>
</div>
</div>
@endsection
