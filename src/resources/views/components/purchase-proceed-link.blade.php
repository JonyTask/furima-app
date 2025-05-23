@if ($item->sold())
<a href="#" class="btn item__purchase disable" disabled>売り切れました</a>
@elseif($item->mine())
<a href="#" class="btn item__purchase disable" disabled>購入できません</a>
@else
<a href="/purchase/{{$item->id}}" class="btn item__purchase">購入手続きへ</a>
@endif