@if (!(preg_match('[/news]', URL::current())))
   <a href="/articles" class="news-title">
      Новости
   </a>
   <div class="news">
       <div class="b-news">
          <div class="b-photo-news item-news-title" rel="article{{$article->id}}">
             <img src="{{ Storage::url($article->img_middle)}}" alt="{{ $article->alt }}" />
          </div>
          <div class="b-text-news">
             <div class="b-title-news item-news-title" rel="article{{ $article->id }}">{{ $article->title }}</div>
             <div class="b-descreption-news">
               {{ $article->description }}
             </div>
             <div class="b-date-news">
                @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
                {{ $article->date->formatLocalized('%d %B %Y')}}
             </div>
          </div>
        </div>
   </div>
@endif
