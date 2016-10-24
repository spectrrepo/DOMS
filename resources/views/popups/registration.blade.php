<div class="overlay">
  <div class="modal">
    <span class="close"></span>
    <span class="title-reg">Регистрация</span>
    <div class="b-soc-net-login">
      <span class="title-text">Войти через социальные сети</span>
      <span class="fb"></span>
      <span class="vk"></span>
      <span class="not-wor-text">
        Не беспокойтесь, мы никогда не сделаем пост без вашего разрешения
      </span>
      <div class="clear"></div>
    </div>
    {{ Form::open() }}
    <div class="b-form-inputs">
      <span class="title-text bottom-line">Или зарегистрироваться через адрес электронной почты</span>
      <div class="wrap-left-inp">
        <span class="label">Имя</span>
        <input class="input-reg" type="text" name="name" value="">
      </div>
      <div class="wrap-left-inp">
        <span class="label">Адрес элестронной почты</span>
        <input class="input-reg" type="text" name="name" value="">
      </div>
      <div class="wrap-left-inp">
        <span class="label">Телефон</span>
        <input class="input-reg" type="text" name="name" value="">
      </div>
      <div class="wrap-left-inp">
        <span class="label">Пароль</span>
        <input class="input-reg" type="text" name="name" value="">
      </div>
    </div>
    <div class="b-choose-status">
      <span class="title-reg">Статус пользователя</span>
      <div class="b-item-status">
        <input class="radio-opacity" type="radio" name="name" value="">
        <div class="b-img">
          <img src="" alt="" />
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
        <input class="radio-opacity" type="radio" name="name" value="">
        <div class="b-img">
          <img src="" alt="" />
        </div>
        <span class="name-status">Мастер</span>
        <p class="description-status">
          Я могу оказывать услуги по воплощению идей
          оформления интерьеров в жизнь и хочу искать
          заказчиков с помощью сайта
        </p>
      </div>
      <div class="b-item-status">
        <input class="radio-opacity" type="radio" name="name" value="">
        <div class="b-img">
          <img src="" alt="" />
        </div>
        <span class="name-status">Дизайнер</span>
        <p class="description-status">
          Я хочу делиться своими идеями по оформлению
          интерьеров и искать заказчиков с помощью
          сайта
        </p>
      </div>
      <div class="b-item-status">
        <input class="radio-opacity" type="radio" name="name" value="">
        <div class="b-img">
          <img src="" alt="" />
        </div>
        <span class="name-status">Магазин</span>
        <p class="description-status">
          Я хочу продавать свои товары для интерьеров
          с помощью сайта
        </p>
      </div>
      <div class="clear"></div>
    </div>
    <input type="submit" name="name" value="">
  </div>
</div>
