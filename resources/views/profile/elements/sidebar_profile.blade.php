<!-- TODO:add link -->
<nav class="sidebar" style="margin-top:-16px;">
  <ul>
    <li class="menu-item-profile {{ preg_match('[/profile/'.Auth::id().']', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a></li>
    <li class="menu-item-profile {{ preg_match('[/add/photo]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('addPostPage') }}">Добавить изображение</a></li>
    <li class="menu-item-profile {{ preg_match('[/edit/user]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('editUserPage') }}">Редактировать профиль</a></li>
    <li class="menu-item-profile {{ preg_match('[/liked/photo]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('favoritePage') }}">Избранное</a></li>
     @if ((Auth::user()->hasRole('moderator')) || (Auth::user()->hasRole('admin')))

      <li class="menu-item-profile"><a href="{{ URL::route('confirmList') }}"> Изображения на проверку</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('listArticlePage') }}"> Новости</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('listCommentsPage') }}">Комментарии <span class="indicators">+1</span></a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('listFeedbackPage') }}">Сообщения <span class="indicators">+1</span></a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('listClaimsPage') }}">Претензии <span class="indicators">+1</span></a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('allPostSitePage') }}">Все фото</a></li>

      @if (Auth::user()->hasRole('admin'))

        <li class="menu-item-profile"><a href="{{ URL::route('listPlacePage') }}">Элементы сортировки</a></li>
        <li class="menu-item-profile"><a href="{{ URL::route('listSlidesPage') }}">Изменение слайдов</a></li>
        {{-- <li class="menu-item-profile"><a href="{{ URL::route('slide') }}">Пользователи</a></li>
        <li class="menu-item-profile"><a href="{{ URL::route('slide') }}">Настройки сайта</a></li> --}}

      @endif
    @endif
  </ul>
</nav>
