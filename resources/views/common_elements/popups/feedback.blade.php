<div class="overlay" id="popup-feedback">
  <div class="modal modal-feedback">
    <span class="popup-close close uk-icon-justify uk-icon-remove"></span>
    <div class="modal-feedback-center">
      <span class="title-link">Контакты</span>
      <p>
        По вопросам сотрудничества пишите нам на адрес
        <a href="mailto:domspectr@gmail.com">domspectr@gmail.com</a>
        или отправьте сообщение с помощью формы обратной связи:
      </p>
      <div class="clear"></div>
      <div class="b-soc-set-round">
        <span class="uk-icon-justify uk-icon-facebook-f round-fb"></span>
        <span class="uk-icon-justify uk-icon-vk round-vk"></span>
      </div>
      <div class="clear"></div>
      {{ Form::open(array('id'=>'feedback','route' => 'addFeedback' ) ) }}
        @if ($errors->any())
          <div class="uk-alert uk-alert-danger uk-width-1-1" data-uk-alert=""style="display: block;">
            <a href="" class="uk-alert-close uk-close"></a>
            @foreach ($errors->all() as $error)
              <ul style="margin-left: 12px;" class="uk-list">
                <li>{{ $error }}</li>
              </ul>
            @endforeach
          </div>
        @endif
        <input class="input-feedback left" type="text" name="name" required placeholder="Имя">
        <input class="input-feedback right" type="text" name="email" required placeholder="E-mail">
        <textarea class="textarea-feedback" name="message" required></textarea>
        <input class="feedback-submit" type="submit" value="Отправить сообщение">
      {{ Form::close() }}
      <div class="clear"></div>
     </div>
  </div>
</div>
