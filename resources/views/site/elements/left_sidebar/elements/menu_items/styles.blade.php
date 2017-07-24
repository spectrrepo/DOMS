<li id="styles" class="menu-item uk-clearfix">
    <div class="click-ready">
        Стили
        <span class="ungle-item uk-icon-justify uk-icon-angle-right"></span>
    </div>
    <div class="sidebar-modal styles-modal uk-clearfix" data-max="3">
        <span class="close white-close uk-icon-justify uk-icon-remove"></span>
        <ul class="styles-space">
            @foreach ( $styles as $style )
                @include('site.elements.left_sidebar.elements.menu_items.item_menu', ['name' => $style->title ])
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
    <ul id="selected-styles" class="subcat-list">
        @if($filter["style"] !== 0)
            @foreach($filter["style"] as $style)
                <li class="choose-sort-item">
                    <span class="name-sort-item">{{$style->title}}</span>
                    <i class="close-sort-item">×</i>
                </li>
            @endforeach
        @endif
    </ul>
</li>
