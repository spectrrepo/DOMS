@extends('layouts.site')
@section('site-content')
<div class="content">
  @if (Session::get('check') == 'true')
    <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;">
      <a href="" class="uk-alert-close uk-close"></a>
      <p>Пароль успешно отправлен на адрес электронной почты: {{ Auth::user()->email }}</p>
    </div>
  @endif
  <h3 class="liked-title">Новости</h3>
  <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $news as $new )
      <div class="wrap-news-item">
        <div class="news-item">
          <img src="{{ $new->news->url() }}"/>
          <a rel="article{{$new->id}}" class="item-news-title">{{$new->title}}</a>
          <p class="item-news-text">
            {{ $new->description }}
          </p>
          <span class="item-news-date">
            <?php setlocale(LC_TIME, 'ru_RU.utf8');  echo \Carbon\Carbon::parse($new->news_updated_at)->formatLocalized('%d %b %Y') ?>
          </span>
        </div>
      </div>
    @endforeach
    <div class="clear"></div>
  </div>
  @foreach ( $news as $new )
  <div class="modal-news article{{$new->id}}">
    <span class="close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
      <img src="{{ $new->news->url() }}" />
      <span class="item-news-title-modal">{{ $new->title }}</span>
      <div class="popup-text-news">
        {{ $new->full_description }}
      </div>
      <?php $newsViews = \App\NewsVariant::where('new_id', '=', $new->id)->get();
           foreach ($newsViews as $item) {
               echo "<img src='$item->file_path_full'/>";
           }
      ?>
    </div>
  </div>
  @endforeach
</div>
@endsection
