<a href="{{ route('editPostPage', ['id' => $post->id])}}" class="item-gallery" style="position:absolute" data-grid-prepared="true">
    <div class="uk-panel-box">
        <img src="{{ Storage::url($post->img_square) }}" alt="" />
        <div class="ico-liked">
            <span class="uk-icon-justify uk-icon-eye"></span>
            <span>{{ !$post->views_count ? '0' : $post->views_count }}</span>
            <span class="uk-icon-justify uk-icon-heart"></span>
            <span>{{ $post->likes->count() }}</span>
            <span class="uk-icon-justify uk-icon-comments"></span>
            <span>{{ $post->comments->count() }}</span>
        </div>
        <div class="clear"></div>
    </div>
</a>