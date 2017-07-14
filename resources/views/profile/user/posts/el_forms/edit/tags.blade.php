<div class="wrap-add-tag uk-clearfix">
    <div class="label-tag-input">Теги</div>
    <input class="input-tag-name" type="text" name="name" placeholder="Введите тег">
    <button class="btn-add-tag uk-icon-justify uk-icon-plus" type="button" name="button"></button>
    <hr>
    <div class="pole-tag uk-clearfix">
        @foreach ($post->tags as $tag)
            <div class="tag-item delete-tag" data-id="{{$tag->id}}">{{ $tag->value }}</div>
        @endforeach
    </div>
</div>