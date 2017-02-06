
<nav class="sidebar">
    <ul>
      <li id="placements{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
        <span class="click-ready">
            Помещения
            <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
        </span>
        <div class="sidebar-modal rooms" data-max="3">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul>
               @foreach ( $rooms as $room )
                   <li class="item-moodal-sidebar" data-url="{{ $room->id }}" >
                     <span class="item-modal-text"> {{ $room->title }} </span>
                     <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                     <div class="clear"></div>
                   </li>
               @endforeach
             </ul>
        </div>
        <div class="clear"></div>
        <!-- @foreach ($rooms as $room)
          @if (preg_match('['.$room->id.']', $roomSorting))
           <li class="choose-sort-item" data-list="1" data-url="1">
              <span class="name-sort-item"> {{ $room->title}} </span>
              <i class="close-sort-item">×</i>
           </li>
          @endif
        @endforeach -->
      </li>
      <li id="styles{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
        <span class="click-ready">
            Стили
            <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
        </span>
        <div class="sidebar-modal styles-modal" data-max="3">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul class="styles-space">
             @foreach ( $styles as $style )
               <li class="item-moodal-sidebar item-styles" data-url="{{ $style->id }}">
                 <span class="item-modal-text">{{ $style->name }}</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
             @endforeach
             </ul>
             <div class="b-preview-style">
               <img src="http://doms.design/res/section/default-style/_img_400x_20/logotipyi.5802.png">
               <p class="style-description">
                  Вы можете выбрать до 3-х интересующих Вас стилей,
                  а мы подберем самые подходящие интерьерные решения,
                  Вам остаётся только собрать свою коллекцию избранного!
               </p>
             </div>
           </div>
           <div class="clear"></div>
           <!-- @foreach ($styles as $style)
               @if (preg_match('['.$style->id.']', $styleSorting))
                  <li class="choose-sort-item" data-list="1" data-url="1">
                     <span class="name-sort-item"> {{ $style->title}} </span>
                     <i class="close-sort-item">×</i>
                  </li>
               @endif
           @endforeach -->
        </li>
      <li id="colors{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
        <span class="click-ready">
            Цвета
            <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
        </span>
        <div class="sidebar-modal" data-max="1">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
               <ul class="colors-space">
               @foreach ($colors as $color)
                 <li class="colors-space-item" data-color="{{ $color->RGB }}" data-url="{{ $color->id }}" style="background:{{ $color->RGB }};">
                   <span class="choose-ico choose-ico-color uk-icon-justify uk-icon-check"></span>
                 </li>
               @endforeach
               <div class="clear"></div>
               </ul>
           </div>
           <div class="clear"></div>
           <!-- @foreach ($colors as $color)
               @if (preg_match('['.$color->id.']', $colorSorting))
                 <li class="choose-sort-item" data-list="1" data-url="1" style="width: 40px;">
                     <span class="name-sort-item" style="display: block;
                     margin: 2px; height: 8px; width: 18px; background:{{ $color->RGB }};"></span>
                     <i class="close-sort-item">×</i>
                 </li>
               @endif
           @endforeach -->
       </li>
      <li id="orders{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
        <span class="click-ready">
            Сортировка
            <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
        </span>
        <div class="sidebar-modal sort" data-max="1">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul>
               <li class="item-moodal-sidebar" data-url="new" >
                 <span class="item-modal-text">Новое</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               <li class="item-moodal-sidebar" data-url="popular">
                 <span class="item-modal-text">Популярное</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               <li class="item-moodal-sidebar" data-url="recommended">
                 <span class="item-modal-text">Рекомендованное</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
             </ul>
           </div>
           <div class="clear"></div>
           <!-- @if (preg_match('/new/', $sortSorting))
               <li class="choose-sort-item" data-list="1" data-url="new">
                   <span class="name-sort-item">Новое</span>
                   <i class="close-sort-item">×</i>
               </li>
           @elseif (preg_match('/recommended/', $sortSorting))
               <li class="choose-sort-item" data-list="1" data-url="new">
                   <span class="name-sort-item">Рекомендованное</span>
                   <i class="close-sort-item">×</i>
               </li>
           @elseif (preg_match('/popular/', $sortSorting))
               <li class="choose-sort-item" data-list="1" data-url="new">
                   <span class="name-sort-item">Популярное</span>
                   <i class="close-sort-item">×</i>
               </li>
           @endif -->
     </li>
    </ul>
    <div class="search">
      <div class="popup-search-tag">

      </div>
      <form class="ajax-search {{ preg_match('[/photo/]', URL::current()) ? 'ajax-search-slider' : ''}}">
          <input class="popup-tag input-search {{ preg_match('[/photo/]', URL::current()) ? 'ajax-input-search-slider' : 'ajax-input-search'}}" type="search" name="tagSearch" autocomplete="off" placeholder="Поиск по тегам">
          <button class="search-submit" type="submit"><span class="uk-icon-justify uk-icon-search"></span ></button>
      </form>
    </div>
</nav>
@if (!(preg_match('[/news]', URL::current())))
<a href="/news" class="news-title">
   Новости
</a>
<div class="news">
    <div class="b-news">

       <div class="b-photo-news item-news-title" rel="article{{$news->id}}">
          <img src="{{$news->news->url()}}" alt="" />

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
<div class="modal-news article{{ $news->id }}">
<span class="close uk-icon-justify uk-icon-remove popup-close-news"></span>
<div class="scroll-place-modal-news">
   <img src="{{  $news->news->url() }} " />
   <span class="item-news-title-modal">{{  $news->title }} </span>
   <div class="popup-text-news">
      {{ $news->full_description }}
   </div>
   <?php $newsViews = \App\NewsVariant::where('new_id', '=', $news->id)->get();
       foreach ($newsViews as $item){
          echo "<img src='{{ $item->file_path_full }}'/>";
       }
   ?>
</div>
<div class="date-and-all-news">
      <?php setlocale(LC_TIME, 'ru_RU.utf8');  echo \Carbon\Carbon::parse($news->news_updated_at)->formatLocalized('%d %b %Y') ?>
      <a href="/news">Просмотреть все новости</a>
</div>
</div>
@endif
