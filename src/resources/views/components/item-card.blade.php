<div class="item">
    <a href="/item/{{$item->id}}">
        @if ($item->sold())
        <div class="item__img--container sold">
            <img src="{{ \Storage::url($item->img_url) }}" class="item__img" alt="商品画像">
        </div>
        @else
        <div class="item__img--container">
            <img src="{{ \Storage::url($item->img_url) }}" class="item__img" alt="商品画像">
        </div>
        @endif
        <p class="item__name">{{$item->name}}</p>
    </a>
</div>