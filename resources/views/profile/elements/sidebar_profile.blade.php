<nav class="sidebar" style="margin-top:-16px;">
    <ul>
        <li class="menu-item-profile {{ route('listPlacePage') === URL::current() ? 'menu-item-profile-active' : '' }}">
            <a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a>
        </li>
        <li class="menu-item-profile {{ route('addPostPage') === URL::current() ? 'menu-item-profile-active' : '' }}">
            <a href="{{ URL::route('addPostPage') }}">Добавить изображение</a>
        </li>
        <li class="menu-item-profile {{ route('editUserPage') === URL::current() ? 'menu-item-profile-active' : '' }}">
            <a href="{{ URL::route('editUserPage') }}">Редактировать профиль</a>
        </li>
        <li class="menu-item-profile {{ route('favoritePage') === URL::current() ? 'menu-item-profile-active' : '' }}">
            <a href="{{ URL::route('favoritePage') }}">Избранное</a>
        </li>
            @if ((Auth::user()->hasRole('moderator')) || (Auth::user()->hasRole('admin')))
                <li class="menu-item-profile {{ route('confirmList') === URL::current() ? 'menu-item-profile-active' : '' }}">
                    <a href="{{ URL::route('confirmList') }}"> Изображения на проверку</a>
                </li>
                <li class="menu-item-profile {{ route('listArticlePage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                    <a href="{{ URL::route('listArticlePage') }}"> Новости</a>
                </li>
                <li class="menu-item-profile {{ route('listCommentsPage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                    <a href="{{ URL::route('listCommentsPage') }}">Комментарии <span class="indicators">+1</span></a>
                </li>
                <li class="menu-item-profile {{ route('listFeedbackPage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                    <a href="{{ URL::route('listFeedbackPage') }}">Сообщения <span class="indicators">+1</span></a>
                </li>
                <li class="menu-item-profile {{ route('listClaimsPage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                    <a href="{{ URL::route('listClaimsPage') }}">Претензии <span class="indicators">+1</span></a>
                </li>
                <li class="menu-item-profile {{ route('allPostSitePage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                    <a href="{{ URL::route('allPostSitePage') }}">Все фото</a>
                </li>
                @if (Auth::user()->hasRole('admin'))
                    <li class="menu-item-profile {{ route('listPlacePage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                        <a href="{{ URL::route('listPlacePage') }}">Элементы сортировки</a>
                    </li>
                    <li class="menu-item-profile {{ route('listSlidesPage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                        <a href="{{ URL::route('listSlidesPage') }}">Изменение слайдов</a>
                    </li>
                    <li class="menu-item-profile {{ route('listRolesPage') === URL::current() ? 'menu-item-profile-active' : '' }}">
                        <a href="{{ URL::route('listRolesPage') }}">Роли</a>
                    </li>
                @endif
            @endif
    </ul>
</nav>
