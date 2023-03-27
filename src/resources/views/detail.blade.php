@extends('layouts.default')

<!-- タイトル -->
@section('title','商品詳細ページ')

<!-- css読み込み -->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/detail.css')  }}" >
@endsection

<!-- 本体 -->
@section('content')

@include('components.header')
<div class="container">
<div class="item">
    <div class="item__img">
        <img src="#" alt="商品画像">
    </div>
    <div class="item__info">
        <h2 class="item__name">商品名</h2>
        <p class="item__price">値段</p>
        <div class="item__form">
            <form class="item__like" action="" method="post">
                <button><i class="fa-regular fa-star fa-2x"></i></button>
                <p class="like__count">3</p>
            </form>
            <div class="item__comment">
                <a href="#"><i class="fa-regular fa-comment fa-2x"></i></a>
                <p class="comment__count">14</p>
            </div>
        </div>
        <a href="#" class="btn item__purchase">購入手続きへ</a>
        <h3 class="item__section">商品説明</h3>
        <p class="item__description">ここにメッセージが入ります</p>
        <h3 class="item__section">商品の情報</h3>
        <table class="item__table">
            <tr>
                <th>カテゴリー</th>
                <td>
                    <ul>
                        <li class="category__btn">洋服</li>
                        <li class="category__btn">メンズ</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>商品の状態</th>
                <td>良好</td>
            </tr>
        </table>
        <div class="comment_section">
            <h3>コメント(14)</h3>
            <div class="comments">
                @for ($i = 0; $i < 3; $i++)
                <div class="comment">
                    <div class="comment__user">
                        <div class="user__img">
                            <img src="#" alt="">    
                        </div>
                        <p class="user__name">名前</p>
                    </div>
                    <p class="comment__content">ここにメッセージが入ります</p>
                </div>
                @endfor
            </div>
            <form class="comment__form"action="#" method="post">
                <p class="comment__form-title">商品へのコメント</p>
                <textarea name="" id="" cols="30" rows="10" class="comment__form-textarea"></textarea>
                <button class="btn comment__form-btn">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
