<li id="colors{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
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
    <div class="selected">

    </div>
</li>
