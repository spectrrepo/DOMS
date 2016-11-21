<header>
    <!-- TODO: add link on the true page -->
    <a href="/room=[0],styles=[0],colors=[0],sort=[0]" class="logo"><img src="{{asset('img/logo-doms.png')}}" alt="логотип DOM'S" /></a>
    <div class="control">
      <a href="/room=[0],styles=[0],colors=[0],sort=[0]" class="main-item">Интерьеры</a>
      <a href="{{ URL::route('add') }}" class="plus-photo"><span class="uk-icon-justify uk-icon-plus"></span ></a>
    </div>
    <div class="logining">
      @if ( Auth::check())
      <a href="{{ URL::to('profile/'.Auth::id()) }}" class="logining-item">{{ Auth::user()->name }}</a>
      <a href="{{URL::route('logout')}}" class="logining-item">Выход</a>
      <a href="{{ URL::to('profile/'.Auth::id()) }}">
          <div class="login-portret" style="background:url({{ Auth::user()->avatar->url() }}) center no-repeat; background-size:cover;">
          </div>
      </a>
      @else
       <a id="login" class="logining-item">Вход</a>
       <a id="registration" class="logining-item">Регистрация</a>
      @endif
    </div>
</header>
