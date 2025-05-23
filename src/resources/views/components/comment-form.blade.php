<div id="comment" class="comment_section">
    <h3 id="count__title">コメント({{$item->getComments()->count()}})</h3>
    <div class="comments" id="comments__list">
        @foreach ($item->getComments() as $comment)
        <div class="comment">
            <div class="comment__user">
                <div class="user__img">
                    <img src="{{ \Storage::url($comment->user->profile->img_url) }}" alt="">
                </div>
                <p class="user__name">{{$comment->user->name}}</p>
            </div>
            <p class="comment__content">{{$comment->comment}}</p>
        </div>
        @endforeach
    </div>
    <form action="/item/comment/{{$item->id}}" method="post" class="comment__form" id="comment__form">
        @csrf
        <p class="comment__form-title">商品へのコメント</p>
        <textarea name="comment" id="comment__textarea" cols="30" rows="10" class="comment__form-textarea"></textarea>
        <div class="form__error">
            @error('comment')
            {{ $message }}
            @enderror
        </div>
        <button class="btn comment__form-btn">コメントを送信する</button>
    </form>
</div>