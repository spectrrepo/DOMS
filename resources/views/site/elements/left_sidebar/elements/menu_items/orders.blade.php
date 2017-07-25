<li id="orders" class="menu-item uk-clearfix">
  <div class="click-ready">
    Сортировка
    <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
  </div>
  <div class="sidebar-modal sort uk-clearfix" data-max="1">
    <span class="close white-close uk-icon-justify uk-icon-remove"></span>
    <ul>
        <li class="item-moodal-sidebar uk-clearfix" data-id="new" data-val="Новое">
            <span class="item-modal-text">Новое</span>
            @if($filter['sort'] !== '0')
                <span class="choose-ico uk-icon-justify uk-icon-check {{ $filter['sort'] === 'new' ? 'active-choose-ico' : ''}}"></span>
            @else
                <span class="choose-ico uk-icon-justify uk-icon-check"></span>
            @endif
        </li>
        <li class="item-moodal-sidebar uk-clearfix" data-id="poppular" data-val="Популярное">
            <span class="item-modal-text">Популярное</span>
            @if($filter['sort'] !== '0')
                <span class="choose-ico uk-icon-justify uk-icon-check {{ $filter['sort'] === 'poppular' ? 'active-choose-ico' : ''}}"></span>
            @else
                <span class="choose-ico uk-icon-justify uk-icon-check"></span>
            @endif
        </li>
        <li class="item-moodal-sidebar uk-clearfix" data-id="recommended" data-val="Рекомендовано">
            <span class="item-modal-text">Рекомендовано</span>
            @if($filter['sort'] !== '0')
                <span class="choose-ico uk-icon-justify uk-icon-check {{ $filter['sort'] === 'recommended' ? 'active-choose-ico' : ''}}"></span>
            @else
                <span class="choose-ico uk-icon-justify uk-icon-check"></span>
            @endif
        </li>
    </ul>
  </div>
  <ul id="selected-orders" class="subcat-list">
    @if($filter["sort"] !== "0")
      <li class="choose-sort-item">
        <span class="name-sort-item">
            @if ($filter["sort"] === 'new')
                новое
            @elseif($filter["sort"] === 'poppular')
                популярное
            @else
                рекомендации
            @endif
        </span>
        <i class="close-sort-item">×</i>
      </li>
    @endif
  </ul>
</li>
