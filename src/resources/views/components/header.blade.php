<header class="header">
    <div class="header__logo">
        <a href="/"><img src="img/logo.png" alt="ロゴ"></a>
    </div>
    <nav class="header__nav">
        <ul>
            @if(Auth::check())
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button class="header__logout">ログアウト</button>
                </form>
            </li>
            <li><a href="/mypage">マイページ</a></li>
            @else
            <li><a href="/login">ログイン</a></li>
            <li><a href="/register">会員登録</a></li>
            @endif
            <li class="header__btn"><a href="#">出品</a></li>
        </ul>
    </nav>
</header>