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