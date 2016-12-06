
<nav class="sidebar">
    <ul>
      <li id="placements" class="menu-item">
        <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
        <span class="click-ready">Помещения</span>
        <div class="sidebar-modal rooms">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul>
               @foreach ( $rooms as $room )
               <li class="item-moodal-sidebar" data-type="room" >
                 <span class="item-modal-text"> {{ $room->title }} </span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               @endforeach
             </ul>
           </div>
        <div class="clear"></div>
      </li>
      <li id="styles" class="menu-item">
           <span class="click-ready">Стили</span>
           <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
           <div class="sidebar-modal styles-modal">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul class="styles-space">
             @foreach ( $styles as $style )
               <li class="item-moodal-sidebar item-styles" data-type="style">
                 <span class="item-modal-text">{{ $style->name }}</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
             @endforeach
             </ul>
             <div class="b-preview-style">
               <img src="" alt="" />
               <p class="style-description">
               </p>
             </div>
           </div>
           <div class="clear"></div>
        </li>
      <li id="colors" class="menu-item">
           <span class="click-ready">Цвета</span>
           <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
           <div class="sidebar-modal">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
               <ul class="colors-space">
               @foreach ($colors as $color)
                 <li class="colors-space-item" data-type="color" style="background:{{ $color->RGB }};">
                   <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 </li>
               @endforeach
               <div class="clear"></div>
               </ul>
           </div>
           <div class="clear"></div>
        </li>
      <li id="orders" class="menu-item">
           <span class="click-ready">Сортировка</span>
           <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
           <div class="sidebar-modal sort">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul>
               <li class="item-moodal-sidebar" data-type="sort" >
                 <span class="item-modal-text">Новое</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               <li class="item-moodal-sidebar" data-type="sort">
                 <span class="item-modal-text">Популярное</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               <li class="item-moodal-sidebar" data-type="sort">
                 <span class="item-modal-text">Рекомендованное</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
             </ul>
           </div>
           <div class="clear"></div>
        </li>
    </ul>
    <div class="search">
      <form action="">
          <input class="input-search" type="search" name="name" value="" placeholder="Поиск по тегам">
          <button class="search-submit" type="submit"><span class="uk-icon-justify uk-icon-search"></span ></button>
      </form>
    </div>
</nav>
@if (!(preg_match('[/news]', URL::current())))
<div class="news-title">
   Новости
</div>
<div class="news">
    <div class="b-news">
       <div class="b-photo-news">
          <img src="{{$news->news->url()}}" alt="" />
       </div>
       <div class="b-text-news">
          <div class="b-title-news item-news-title" rel="article{{$news->id}}">{{$news->title}}</div>
          <div class="b-descreption-news">
            {{$news->description}}
          </div>
          <div class="b-date-news">{{$news->news_updated_at->format('d M Y')}}</div>
       </div>
     </div>
</div>
<div class="modal-news article{{$news->id}}">
<span class="close uk-icon-justify uk-icon-remove popup-close-news"></span>
<div class="scroll-place-modal-news">
   <img src="{{ $news->news->url() }}" />
   <span class="item-news-title">{{ $news->title }}</span>
   <div class="">
     {{ $news->full_description }}
   </div>
</div>
</div>
@endif
