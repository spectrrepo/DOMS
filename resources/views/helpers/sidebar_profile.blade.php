<!-- TODO:add link -->
<nav class="sidebar">
  <ul>
    <li class="menu-item"><a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a></li>
    <li class="menu-item"><a href="{{ URL::to('profile/add') }}">Добавить изображение</a></li>
    <li class="menu-item"><a href="{{ URL::to('profile/edit') }}">Редктировать профиль</a></li>
    <li class="menu-item"><a href="{{ URL::to('profile/liked') }}">Избранное</a></li>
  </ul>
</nav>
