<header class="header">
    <div class="header__logo">
        <a href="/"><img src="{{ asset('img/logo.png') }}" alt="ロゴ"></a>
    </div>
    @if( !in_array(Route::currentRouteName(), ['register', 'login', 'verification.notice']) )
    <form class="header_search" action="/item" method="get">
        @csrf
        <input id="inputElement" class="header_search--input" type="text" name="search_item" placeholder="なにをお探しですか？">
        <button id="buttonElement" class="header_search--button">
            <img src="{{ asset('img/search_icon.jpeg') }}" alt="検索アイコン" style="height:100%;">
        </button>
    </form>
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
            <a href="/sell">
                <li class="header__btn">出品</li>
            </a>
        </ul>
    </nav>
    @endif
</header>
<script>
    // const inputElement = document.getElementById('inputElement');
    // const buttonElement = document.getElementById('buttonElement');

    // inputElement.addEventListener("change", function() {
    //     if (!this.value == '') {
    //         buttonElement.style.display = "unset";
    //     } else {
    //         buttonElement.style.display = "none";
    //     }
    // })
</script>