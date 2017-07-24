<li id="orders" class="menu-item uk-clearfix">
  <div class="click-ready">
    Сортировка
    <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
  </div>
  <div class="sidebar-modal sort uk-clearfix" data-max="1">
    <span class="close white-close uk-icon-justify uk-icon-remove"></span>
    <ul>
        @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => 'новое'])
        @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => 'популярное'])
        @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => 'рекомендованное'])
    </ul>
  </div>
  <ul id="selected-orders" class="subcat-list">
    @if($filter["sort"] !== "0")
      <li class="choose-sort-item">
        <span class="name-sort-item">{{$filter["sort"]}}</span>
        <i class="close-sort-item">×</i>
      </li>
    @endif
  </ul>
</li>
