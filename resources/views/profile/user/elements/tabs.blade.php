<div class="b-setting-switcher">
    <ul class="switcher">
        <li class="item-swicher">
            <a href="{{ URL::to('/profile/'.Auth::id()) }}">Обновления</a>
        </li>
        <li class="item-swicher {{ URL::route('userPostsPage', ['id' => $user->id]) === URL::current() ? 'item-switcher-active': '' }}">
            <a href="{{ URL::route('userPostsPage', ['id' => $user->id]) }}">Фотографии</a>
        </li>
        <div class="clear"></div>
    </ul>
</div>