<li id="styles{{ preg_match('[/photo/]', URL::current()) ? '-slider' : ''}}" class="menu-item">
    <span class="click-ready">
    Стили
    <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
    </span>
    <div class="sidebar-modal styles-modal" data-max="3">
        <span class="close white-close uk-icon-justify uk-icon-remove"></span>
        <ul class="styles-space">
            @foreach ( $styles as $style )
            <li class="item-moodal-sidebar item-styles" data-url="{{ $style->id }}">
                <span class="item-modal-text">{{ $style->name }}</span>
                <span class="choose-ico uk-icon-justify uk-icon-check"></span>
                <div class="clear"></div>
            </li>
            @endforeach
        </ul>
        <div class="b-preview-style">
            <img src="http://doms.design/res/section/default-style/_img_400x_20/logotipyi.5802.png">
            <p class="style-description">
                Вы можете выбрать до 3-х интересующих Вас стилей,
                а мы подберем самые подходящие интерьерные решения,
                Вам остаётся только собрать свою коллекцию избранного!
            </p>
        </div>
    </div>
    <div class="clear"></div>
</li>
