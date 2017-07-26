<div class="modal-news news-page article{{ $article->id }}">
    <span class="close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
        <img src="{{ Storage::url($article->img_square) }}" />
        <span class="item-news-title-modal">{{ $article->title }}</span>
        <div class="popup-text-news">
            {!! $article->description_full !!}
        </div>
    </div>
</div>