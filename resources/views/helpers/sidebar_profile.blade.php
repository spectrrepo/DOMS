<!-- TODO:add link -->
<nav class="sidebar" style="margin-top:-16px;">
  <ul>
    <li class="menu-item-profile {{ preg_match('[/profile/'.Auth::id().']', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a></li>
    <li class="menu-item-profile {{ preg_match('[/add/photo]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('add') }}">Добавить изображение</a></li>
    <li class="menu-item-profile {{ preg_match('[/edit/user]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('edit') }}">Редактировать профиль</a></li>
    <li class="menu-item-profile {{ preg_match('[/liked/photo]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('liked') }}">Избранное</a></li>
    {{-- @if (Auth::user()->status === 'moderator') --}}
      <li class="menu-item-profile"><a href="{{ URL::route('verified') }}">Изображения</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('rooms_edit') }}">Элементы сортировки</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('news') }}">Новости</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('comments') }}">Комментарии</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('messages') }}">Сообщения</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('pretense') }}">Претензии</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('slide') }}">Изменение слайдов</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('slide') }}">Все фото</a></li>
    {{-- @endif --}}
  </ul>
</nav>
