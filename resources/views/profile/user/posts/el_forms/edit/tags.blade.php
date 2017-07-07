<div class="wrap-add-tag uk-clearfix">
    <div class="label-tag-input">Теги</div>
    <input class="input-tag-name" type="text" name="name" placeholder="Введите тег">
    <button class="btn-add-tag uk-icon-justify uk-icon-plus" type="button" name="button"></button>
    @foreach ($post->tags as $tag)
        <span class="item-tag-show">{{ $tag->title }}</span>
    @endforeach
</div>