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
</li>
