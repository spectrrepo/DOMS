<div class="modal-news article{{ $news->id }}">
    <span class="close white-close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
       <img src="{{  $news->news->url() }} " />
       <span class="item-news-title-modal">{{  $news->title }} </span>
       <div class="popup-text-news">
          {{ $news->full_description }}
       </div>
    </div>
    <div class="date-and-all-news">
        {{ $news->news_updated_at }}
        <a href="/news">Просмотреть все новости</a>
    </div>
</div>
