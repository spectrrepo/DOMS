<header>
    <!-- TODO: add link on the true page -->
    <a href="{{URL::route('index')}}" class="logo"><img src="{{asset('img/logo-doms.png')}}" alt="логотип DOM'S" /></a>
    <div class="control">
      <a href="{{URL::route('index')}}" class="main-item">Интерьеры</a>
      <a href="{{ URL::route('add') }}" class="plus-photo"><span class="uk-icon-justify uk-icon-plus"></span ></a>
    </div>
    <div class="logining">
      <a href="{{ URL::to('profile/'.Auth::id()) }}" class="logining-item">Виктор</a>
      <a href="{{URL::route('logout')}}" class="logining-item">Выход</a>
    </div>
</header>
