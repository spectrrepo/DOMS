<li id="orders{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
  <span class="click-ready">
    Сортировка
    <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
  </span>
  <div class="sidebar-modal sort" data-max="1">
    <span class="close white-close uk-icon-justify uk-icon-remove"></span>
    <ul>
        @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => 'новое'])
        @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => 'популярное'])
        @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => 'рекомендованное'])
    </ul>
  </div>
  <div class="clear"></div>
</li>
