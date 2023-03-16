<div class="rating-stars">
    @for ($x = 5; $x > 0; $x--)
        <input type="radio" id="{{ "star-$name-$x" }}" name="{{ $name }}" value="{{ $x }}" {{ $checked != '' ? ($checked == $x ? 'checked':''):($x == 3 ? 'checked':'') }}>

        <label for="{{ "star-$name-$x" }}">
            <i class="fa fa-star"></i>

            {{ "$x stars" }}
        </label>
    @endfor
</div>
