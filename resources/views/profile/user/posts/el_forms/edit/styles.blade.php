<div class="small-col uk-clearfix">
    <div class="title-tag-list">
        Стили
    </div>
    <div class="tags-list">
        @foreach ( $styles as $style )
            <div class="wrap-tags-list-item">
                <input class="opacity-radio" {{ $post->styles->contains($style->id) ? 'checked' : '' }} type="checkbox" name="style[]" value="{{ $style->id }}">
                <div class="tags-list-item">
                    {{ $style->title }}
                </div>
            </div>
        @endforeach
    </div>
</div>