<div class="purchase">
    <div class="purchase__flex">
        <h3 class="purchase__title">配送先</h3>
        <button type="button" id="destination__update">変更する</button>
    </div>
    <div class="purchase__value">
        <label>〒 <input class="input_destination" name="destination_postcode" value="{{ $user->profile->postcode }}" readonly></label><br>
        <input class="input_destination" name="destination_address" value="{{ $user->profile->address }}" readonly><br>
        @if (isset($user->profile->building))
        <input class="input_destination" name="destination_building" value="{{ $user->profile->building }}" readonly>
        @endif
    </div>
    <div class="setting__flex">
        <button type="button" id="destination__setting">変更完了</button>
    </div>
</div>