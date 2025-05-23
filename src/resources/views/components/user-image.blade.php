<div class="user__img">
    @if (isset($profile->img_url))
    <img class="user__icon" src="{{ \Storage::url($profile->img_url) }}" alt="">
    @else
    <img id="myImage" class="user__icon" src="{{ asset('img/icon.png') }}" alt="">
    @endif
</div>