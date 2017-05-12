@if (!(preg_match('[/news]', URL::current())))
<a href="/news" class="news-title">
   Новости
</a>
<div class="news">
    <div class="b-news">
       <div class="b-photo-news item-news-title" rel="article{{$news->id}}">
          <img src="{{ $news->news->url() }}" alt="" />
       </div>
       <div class="b-text-news">
          <div class="b-title-news item-news-title" rel="article{{ $news->id }}">{{ $news->title }}</div>
          <div class="b-descreption-news">
            {{ $news->description }}
          </div>
          <div class="b-date-news">
            <?php setlocale(LC_TIME, 'ru_RU.utf8');
            echo \Carbon\Carbon::parse($news->news_updated_at)->formatLocalized('%d %b %Y') ?>
          </div>
       </div>
     </div>
</div>
@endif
