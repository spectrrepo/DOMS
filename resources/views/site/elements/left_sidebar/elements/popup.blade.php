<div class="modal-news article{{ $article->id }}">
    <span class="close white-close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
       <img src="{{  $article->img_large }} " />
       <span class="item-news-title-modal">{{  $article->title }} </span>
       <div class="popup-text-news">
          {{ $article->full_description }}
       </div>
    </div>
    <div class="date-and-all-news">
        <a href="/news">Просмотреть все новости</a>
    </div>
</div>
