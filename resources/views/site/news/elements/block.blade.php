<div class="wrap-news-item">
    <div class="news-item">
        <img src="{{  Storage::url($article->img_large) }}"/>
        <a rel="article{{ $article->id }}" class="item-news-title">{{ $article->title }}</a>
        <p class="item-news-text">
            {{ $article->description }}
        </p>
        <span class="item-news-date">
            @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
            {{ $article->date->formatLocalized('%d %B %Y')}}
        </span>
    </div>
</div>