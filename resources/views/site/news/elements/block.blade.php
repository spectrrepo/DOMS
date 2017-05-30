<div class="wrap-news-item">
    <div class="news-item">
        <img src="{{ $article->img_middle }}"/>
        <a rel="article{{ $article->id }}" class="item-news-title">{{ $article->title }}</a>
        <p class="item-news-text">
            {{ $article->description }}
        </p>
        <span class="item-news-date">
          </span>
    </div>
</div>