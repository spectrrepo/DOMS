<div class="modal-news article{{ $article->id }}">
    <span class="close white-close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
       <img src="{{  Storage::url($article->img_large) }} " />
       <span class="item-news-title-modal">{{  $article->title }} </span>
       <div class="popup-text-news">
          {{ $article->full_description }}
       </div>
    </div>
    <div class="date-and-all-news">
        <date>
            @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
            {{ $article->date->formatLocalized('%d %B %Y')}}</date>
        <a href="/articles">Просмотреть все новости</a>
    </div>
</div>
