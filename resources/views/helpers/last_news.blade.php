<div class="modal-news article{{ $news->id }}">
    <span class="close white-close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
       <img src="{{  $news->news->url() }} " />
       <span class="item-news-title-modal">{{  $news->title }} </span>
       <div class="popup-text-news">
          {{ $news->full_description }}
       </div>
       <?php $newsViews = \App\NewsVariant::where('new_id', '=', $news->id)->get();
           foreach ($newsViews as $item){
              echo "<img src='$item->file_path_full'/>";
           }
       ?>
    </div>
    <div class="date-and-all-news">
          <?php setlocale(LC_TIME, 'ru_RU.utf8');  echo \Carbon\Carbon::parse($news->news_updated_at)->formatLocalized('%d %b %Y') ?>
          <a href="/news">Просмотреть все новости</a>
    </div>
</div>
