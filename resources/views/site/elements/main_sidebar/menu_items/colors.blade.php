<li id="colors{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
  <span class="click-ready">
    Цвета
    <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
  </span>
  <div class="sidebar-modal" data-max="1">
    <span class="close white-close uk-icon-justify uk-icon-remove"></span>
    <ul class="colors-space">
      @foreach ($colors as $color)
      <li class="colors-space-item" data-color="{{ $color->RGB }}" data-url="{{ $color->id }}" style="background:{{ $color->RGB }};">
        <span class="choose-ico choose-ico-color uk-icon-justify uk-icon-check"></span>
      </li>
      @endforeach
      <div class="clear"></div>
    </ul>
  </div>
  <div class="clear"></div>
</li>
