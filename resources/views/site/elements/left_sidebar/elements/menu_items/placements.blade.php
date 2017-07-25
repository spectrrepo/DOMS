<li id="placements" class="menu-item uk-clearfix">
    <div class="click-ready">
        Помещения
        <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
    </div>
    <div class="sidebar-modal rooms uk-clearfix" data-max="3">
        <span class="close white-close uk-icon-justify uk-icon-remove"></span>
        <ul>
            @foreach ( $placements as $placement )
                @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => $placement, 'nameCat' => 'placements'])
            @endforeach
        </ul>
    </div>
    <ul id="selected-placements" class="subcat-list">
        @if($filter["placements"] !== 0)
            @foreach($filter["placements"] as $placement)
                <li class="choose-sort-item"  data-id="{{ $placement->id }}">
                    <span class="name-sort-item">{{ $placement->title }}</span>
                    <i class="close-sort-item">×</i>
                </li>
            @endforeach
        @endif
    </ul>
</li>
