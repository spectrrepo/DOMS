
<nav class="sidebar">
    <ul>
        <li class="menu-item">
           <span class="click-ready">Помещения</span>
           <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
           <div class="sidebar-modal rooms">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul>
               @foreach ( $rooms as $room )
               <li class="item-moodal-sidebar">
                 <span class="item-modal-text"> {{ $room->title }} </span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               @endforeach
             </ul>
           </div>
        </li>
        <li class="menu-item">
           <span class="click-ready">Стили</span>
           <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
           <div class="sidebar-modal styles-modal">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul class="styles-space">
             @foreach ( $styles as $style )
               <li class="item-moodal-sidebar item-styles">
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
        </li>
        <li class="menu-item">
           <span class="click-ready">Цвета</span>
           <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
           <div class="sidebar-modal">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
               <ul class="colors-space">
               @foreach ($colors as $color)
                 <li class="colors-space-item" style="background:{{ $color->RGB }};">
                   <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 </li>
               @endforeach
               <div class="clear"></div>
               </ul>
           </div>
        </li>
        <li class="menu-item">
           <span class="click-ready">Сортировка</span>
           <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
           <div class="sidebar-modal sort">
             <span class="close white-close uk-icon-justify uk-icon-remove"></span>
             <ul>
               <li class="item-moodal-sidebar">
                 <span class="item-modal-text">Новое</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               <li class="item-moodal-sidebar">
                 <span class="item-modal-text">Популярное</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
               <li class="item-moodal-sidebar">
                 <span class="item-modal-text">Рекомендованное</span>
                 <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                 <div class="clear"></div>
               </li>
             </ul>
           </div>
        </li>
    </ul>
    <div class="search">
      <form action="">
          <input class="input-search" type="search" name="name" value="" placeholder="Поиск по тегам">
          <button class="search-submit" type="submit"><span class="uk-icon-justify uk-icon-search"></span ></button>
      </form>
    </div>
</nav>
<div class="news-title">
   Новости
</div>
<div class="news">
    <div class="b-news">
       <div class="b-photo-news">
          <img src="img/place_for_reklama.jpg" alt="" />
       </div>
       <div class="b-text-news">
          <div class="b-title-news">Квартира в доме ХIX века в Милане</div>
          <div class="b-descreption-news">
           Студия Architetto Michele De Lucchi
           оформила интерьер апартаментов в Милане, Италия.
          </div>
          <div class="b-date-news">10 августа 2015</div>
       </div>
     </div>
</div>
