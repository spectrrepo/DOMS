<div class="wrap-news-item">
    <div class="news-item">
        <img src="{{ $new->news->url() }}"/>
        <a rel="article{{ $new->id }}" class="item-news-title">{{ $new->title }}</a>
        <p class="item-news-text">
            {{ $new->description }}
        </p>
        <span class="item-news-date">
            {{ $new->news_updated_at }}
          </span>
    </div>
</div>