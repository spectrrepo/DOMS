<header>
  <a href="/" class="logo"><img src="{{ asset('img/logo-doms.png') }}" alt="логотип DOM'S" /></a>
  <div class="control">
     <a href="/" class="main-item">Интерьеры</a>
     @if ( Auth::check())
     <a href="{{ URL::route('addPostPage') }}" class="plus-photo">
         <span class="uk-icon-justify uk-icon-plus"></span >
     </a>
     @else
     <span class="login plus-photo">
         <span class="uk-icon-justify uk-icon-plus"></span >
     </span>
     @endif
  </div>
    <div class="logining">
      @if ( Auth::check())
          <a href="{{ URL::route('userPage',['id' => Auth::id()]) }}" class="logining-item logining-item-top">
              {{ Auth::user()->name }}
          </a>
          <a href="{{ URL::route('logout') }}" class="logining-item">Выход</a>
          <a href="{{ URL::route('userPage',['id' => Auth::id()]) }}">
              <div class="login-portret">
                  <img src="{{ Storage::url(Auth::user()->img_mini) }}" alt="">
              </div>
          </a>
      @else
           <a class="login logining-item">Вход</a>
           <a id="registration" class="logining-item">Регистрация</a>
      @endif
    </div>
</header>
