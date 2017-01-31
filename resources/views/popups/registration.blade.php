<div class="overlay" id="popup-registr">
  <div class="modal modal-reg">
    <span class="close uk-icon-justify uk-icon-remove popup-close"></span>
    <span class="title-reg">Регистрация</span>
    <div class="clear"></div>
    <div class="b-soc-net-login">
      <span class="title-text">Войти через социальные сети</span>
      <a href="/socialite/facebook" class="uk-icon-justify uk-icon-facebook-f fb"></a>
      <a href="/social_login/vkontakte" class="uk-icon-justify uk-icon-vk vk"></a>
      <span class="not-wor-text">
        Не беспокойтесь, мы никогда не сделаем пост без вашего разрешения
      </span>
      <div class="clear"></div>
    </div>
    {{ Form::open(array('url' => '/reg')) }}
    <div class="b-form-inputs">
      <span class="title-text bottom-line">Или зарегистрироваться через адрес электронной почты</span>
      <div class="wrap-reg-inp">
        <span class="label">Имя</span>
        <input class="input-reg" type="text" name="name" >
      </div>
      <div class="wrap-reg-inp">
        <span class="label">Адрес электронной почты</span>
        <input class="input-reg" type="text" name="email" >
      </div>
      <div class="wrap-reg-inp">
        <span class="label">Телефон</span>
        <input class="input-reg" type="text" name="phone" >
      </div>
      <div class="wrap-reg-inp">
        <span class="label">Пароль</span>
        <input class="input-reg" type="text" name="password" >
      </div>
    </div>
    <div class="b-choose-status">
      <span class="title-reg">Статус пользователя</span>
      <div class="clear"></div>
      <div class="b-item-status">
        <input class="radio-opacity" type="radio" name="status" value="user">
        <div class="b-img">
          <img src="/img/item-status-reg/item-reg.png" alt="иконка пользователя DOMS" />
          <span class="check-status-reg uk-icon-justify uk-icon-check"></span>
        </div>
        <span class="name-status">Пользователь</span>
        <p class="description-status">
          Я хочу работать с самой большой базой идей
          для интерьеров, а также добавлять свои
          интерьеры, общаться с дизайнерами, искать
          прикольные товары
        </p>
      </div>
      <div class="b-item-status">
        <input class="radio-opacity" type="radio" name="status" value="master">
        <div class="b-img">
          <img src="/img/item-status-reg/item-reg-2.png" alt="иконка мастера DOMS" />
          <span class="check-status-reg uk-icon-justify uk-icon-check"></span>
        </div>
        <span class="name-status">Мастер</span>
        <p class="description-status">
          Я могу оказывать услуги по воплощению идей
          оформления интерьеров в жизнь и хочу искать
          заказчиков с помощью сайта
        </p>
      </div>
      <div class="b-item-status">
        <input class="radio-opacity" type="radio" name="status" value="designer">
        <div class="b-img">
          <img src="/img/item-status-reg/item-reg-3.png" alt="иконка дизайнера DOMS" />
          <span class="check-status-reg uk-icon-justify uk-icon-check"></span>
        </div>
        <span class="name-status">Дизайнер</span>
        <p class="description-status">
          Я хочу делиться своими идеями по оформлению
          интерьеров и искать заказчиков с помощью
          сайта
        </p>
      </div>
      <div class="b-item-status">
        <input class="radio-opacity" type="radio" name="status" value="shop">
        <div class="b-img">
          <img src="/img/item-status-reg/item-reg-4.png" alt="иконка магазина DOMS" />
          <span class="check-status-reg uk-icon-justify uk-icon-check"></span>
        </div>
        <span class="name-status">Магазин</span>
        <p class="description-status">
          Я хочу продавать свои товары для интерьеров
          с помощью сайта
        </p>
      </div>
      <div class="clear"></div>
    </div>
    <input class="registr-submit" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
  </div>
</div>
