@if (!(preg_match('[/news]', URL::current())))
   <a href="/news" class="news-title">
      Новости
   </a>
   <div class="news">
       <div class="b-news">
          <div class="b-photo-news item-news-title" rel="article{{$news->id}}">
             <img src="{{ $news->news->url() }}" alt="{{ $news->alt }}" />
          </div>
          <div class="b-text-news">
             <div class="b-title-news item-news-title" rel="article{{ $news->id }}">{{ $news->title }}</div>
             <div class="b-descreption-news">
               {{ $news->description }}
             </div>
             <div class="b-date-news">
               {{ $news->news_updated_at }}
             </div>
          </div>
        </div>
   </div>
@endif
