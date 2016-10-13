<!-- TODO:add link -->
<nav class="sidebar">
  <ul>
    <li class="menu-item"><a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a></li>
    <li class="menu-item"><a href="{{ URL::route('add') }}">Добавить изображение</a></li>
    <li class="menu-item"><a href="{{ URL::route('edit') }}">Редктировать профиль</a></li>
    <li class="menu-item"><a href="{{ URL::route('liked') }}">Избранное</a></li>
  </ul>
</nav>
