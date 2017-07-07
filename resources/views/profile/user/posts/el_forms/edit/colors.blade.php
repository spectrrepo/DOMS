<div class="title-choose-color">Укажи основные цвета</div>
<div class="color-place">
    @foreach ( $colors as $color)
        <div class="wrap-color-input">
            <input class="color-photo-choose"{{ $post->colors->contains($color->id) ? 'checked' : '' }} type="checkbox" name="color[]" value="{{ $color->id }}" />
            <div class="b-color-input" id="color_{{ $color->title }}" style="background:{{ $color->hash}}"></div>
        </div>
    @endforeach
    <div class="clear"></div>
</div>