<li id="placements{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
  <span class="click-ready">
    Помещения
    <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
  </span>
  <div class="sidebar-modal rooms" data-max="3">
    <span class="close white-close uk-icon-justify uk-icon-remove"></span>
    <ul>
      @foreach ( $rooms as $room )
        <li class="item-moodal-sidebar" data-url="{{ $room->id }}" >
          <span class="item-modal-text"> {{ $room->title }} </span>
          <span class="choose-ico uk-icon-justify uk-icon-check"></span>
          <div class="clear"></div>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="clear"></div>
</li>
