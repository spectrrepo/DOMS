<!-- TODO:add link -->
<nav class="sidebar" style="margin-top:-16px;">
  <ul>
    <li class="menu-item-profile {{ preg_match('[/profile/'.Auth::id().']', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::to('profile/'.Auth::id()) }}">Моя страница</a></li>
    <li class="menu-item-profile {{ preg_match('[/add/photo]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('add') }}">Добавить изображение</a></li>
    <li class="menu-item-profile {{ preg_match('[/edit/user]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('edit') }}">Редактировать профиль</a></li>
    <li class="menu-item-profile {{ preg_match('[/liked/photo]', URL::current()) ? 'menu-item-profile-active' : '' }}"><a href="{{ URL::route('liked') }}">Избранное</a></li>
     @if ((Auth::user()->status === 'moderator') || (Auth::user()->status === 'admin'))
      <?php
            $comments = Illuminate\Support\Facades\DB::table('Comments')->where('status', '=', 'not_read')->count();
            $pretenses = Illuminate\Support\Facades\DB::table('copyright')->where('status', '=', 'not_read')->count();
            $messagesMail = Illuminate\Support\Facades\DB::table('Message_mail')->where('status', '=', 'not_read')->count();
      ?>

      <li class="menu-item-profile"><a href="{{ URL::route('verified') }}">Изображения на проверку</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('news') }}">Новости</a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('comments') }}">Комментарии <span class="indicators">+{{ $comments }}</span></a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('messages') }}">Сообщения <span class="indicators">+{{ $messagesMail }}</span></a></li>
      <li class="menu-item-profile"><a href="{{ URL::route('pretense') }}">Претензии <span class="indicators">+{{ $pretenses }}</span></a></li>
      <li class="menu-item-profile"><a href="{{ URL::to('/profile/admin/photo/all') }}">Все фото</a></li>

      @if (Auth::user()->status === 'admin')

        <li class="menu-item-profile"><a href="{{ URL::route('rooms_edit') }}">Элементы сортировки</a></li>
        <li class="menu-item-profile"><a href="{{ URL::route('slide') }}">Изменение слайдов</a></li>
        {{-- <li class="menu-item-profile"><a href="{{ URL::route('slide') }}">Пользователи</a></li>
        <li class="menu-item-profile"><a href="{{ URL::route('slide') }}">Настройки сайта</a></li> --}}

      @endif
    @endif
  </ul>
</nav>
