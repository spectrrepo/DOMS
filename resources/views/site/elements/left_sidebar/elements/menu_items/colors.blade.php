<li id="colors" class="menu-item uk-clearfix">
    <div class="click-ready">
        Цвета
        <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
    </div>
    <div class="sidebar-modal uk-clearfix" data-max="1">
        <span class="close white-close uk-icon-justify uk-icon-remove"></span>
        <ul class="colors-space uk-clearfix">
            @foreach ($colors as $color)
                <li class="colors-space-item" data-color="{{ $color->hash }}" data-url="{{ $color->id }}" style="background:{{ $color->hash }};">
                    <span class="choose-ico choose-ico-color uk-icon-justify uk-icon-check"></span>
                </li>
            @endforeach
        </ul>
    </div>
    <ul id="selected-colors" class="subcat-list">
        @if($filter["color"] !== 0)
            <li class="choose-sort-item choose-sort-item-color">
                <span class="name-sort-item color-sort-item" style="{{$filter["color"]}}"></span>
                <i class="close-sort-item">×</i>
            </li>
        @endif
    </ul>
</li>
