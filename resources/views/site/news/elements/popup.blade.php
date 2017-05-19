<div class="modal-news article{{ $new->id }}">
    <span class="close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
        <img src="{{ $new->news->url() }}" />
        <span class="item-news-title-modal">{{ $new->title }}</span>
        <div class="popup-text-news">
            {{ $new->full_description }}
        </div>
    </div>
</div>