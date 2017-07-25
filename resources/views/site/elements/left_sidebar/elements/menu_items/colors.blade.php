<li id="colors" class="menu-item uk-clearfix">
    <div class="click-ready">
        Цвета
        <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
    </div>
    <div class="sidebar-modal uk-clearfix" data-max="1">
        <span class="close white-close uk-icon-justify uk-icon-remove"></span>
        <ul class="colors-space uk-clearfix">
            @foreach ($colors as $color)
                <li class="item-moodal-sidebar colors-space-item" data-val="{{ $color->hash }}" data-id="{{ $color->id }}" style="background:{{ $color->hash }};">
                    @if($filter["color"] !== 0)
                        <span class="choose-ico choose-ico-color uk-icon-justify uk-icon-check {{ $filter["color"]->id === $color->id  ? 'active-choose-ico' : ''}}"></span>
                    @else
                        <span class="choose-ico choose-ico-color uk-icon-justify uk-icon-check"></span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <ul id="selected-colors" class="subcat-list">
        @if($filter["color"] !== 0)
            <li class="choose-sort-item choose-sort-item-color" data-id="{{ $filter["color"]->id }}">
                <span class="name-sort-item color-sort-item" style="background: {{$filter["color"]->hash}}"></span>
                <i class="close-sort-item">×</i>
            </li>
        @endif
    </ul>
</li>
