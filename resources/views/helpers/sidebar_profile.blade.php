<!-- TODO:add link -->
<nav class="sidebar">
  <ul>
    <li class="menu-item"><a href="{{ URL::to('profile/'.$id) }}">Моя страница</a></li>
    <li class="menu-item"><a href="{{ URL::to('profile/'.$id.'/add') }}">Добавить изображение</a></li>
    <li class="menu-item"><a href="{{ URL::to('profile/'.$id).'/edit' }}">Редктировать профиль</a></li>
    <li class="menu-item"><a href="{{ URL::to('profile/'.$id).'/liked' }}">Избранное</a></li>
  </ul>
</nav>
