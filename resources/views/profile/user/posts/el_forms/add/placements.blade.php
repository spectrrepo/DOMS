<div class="small-col">
    <div class="title-tag-list">
        Помещения
    </div>
    <div class="tags-list">
        @foreach ( $placements as $placement )
            <div class="wrap-tags-list-item">
                <input class="opacity-radio" type="checkbox" name="room[]" value="{{ $placement->id }}">
                <div class="tags-list-item">
                    {{ $placement->title }}
                </div>
            </div>
        @endforeach
    </div>
</div>