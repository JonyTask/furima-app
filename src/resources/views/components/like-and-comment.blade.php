<div class="item__form">
    <form action="{{ $item->liked() ? '/item/unlike/'.$item->id : '/item/like/'.$item->id  }}" method="post" class="item__like" id="like__form">
        @csrf
        <button><i class="fa-2xl fa-heart {{ $item->liked() ? 'fa-sharp fa-solid' : 'fa-regular' }}"></i></button>
        <p class="like__count">{{$item->likeCount()}}</p>
    </form>
    <div class="item__comment">
        <a href="#comment"><i class="fa-regular fa-comment fa-2xl"></i></a>
        <p class="comment__count">{{$item->getComments()->count()}}</p>
    </div>
</div>