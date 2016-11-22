<!-- TODO:add link -->
<nav class="sidebar">
  <ul>
    <li class="menu-item-profile"><a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('add') }}">Добавить изображение</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('edit') }}">Редктировать профиль</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('liked') }}">Избранное</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('rooms_edit') }}">Элементы сортировки</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('verified') }}">Изображения</a></li>
    <li class="menu-item-profile"><a href="{{ URL::route('news') }}">Новости</a></li>
  </ul>
</nav>
