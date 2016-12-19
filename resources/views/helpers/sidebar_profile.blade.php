<!-- TODO:add link -->
<nav class="sidebar" style="margin-top:-16px;">
  <ul>
    <li class="menu-item-profile"><a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('add') }}">Добавить изображение</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('edit') }}">Редактировать профиль</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('liked') }}">Избранное</a></li>
    @if (Auth::user()->status === 'moderator')
      <li class="menu-item-profile"><a href="{{ URL::route('verified') }}">Изображения</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('rooms_edit') }}">Элементы сортировки</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('news') }}">Новости</a></li>
      {{--<li class="menu-item-profile"><a href="{{ URL::route('news') }}">Комментарии</a></li>--}}
    @endif
    {{-- <li class="menu-item-profile"><>Сообщения</a></li> --}}

  </ul>
</nav>
