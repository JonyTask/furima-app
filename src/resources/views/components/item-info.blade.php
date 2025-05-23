<h3 class="item__section">商品説明</h3>
<p class="item__description">{{$item->description}}</p>
<h3 class="item__section">商品の情報</h3>
<table class="item__table">
    <tr>
        <th>ブランド</th>
        <td>{{ ($item->brand !== null && $item->brand !== '') ? $item->brand : '未入力' }}</td>
    </tr>
    <tr>
        <th>カテゴリー</th>
        <td>
            <ul class="item__table-category">
                @foreach ($item->categories() as $category)
                <li class="category__btn">{{$category->category}}</li>
                @endforeach
            </ul>
        </td>
    </tr>
    <tr>
        <th>商品の状態</th>
        <td>{{$item->condition->condition}}</td>
    </tr>
</table>