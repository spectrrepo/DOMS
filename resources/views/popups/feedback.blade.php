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
      {{ Form::open(array('url' => '/send_mail' ) ) }}
      <input class="input-feedback left" required="" type="text" name="name" value="" placeholder="Имя">
      <input class="input-feedback right" required="" type="text" name="e_mail" value="" placeholder="E-mail">
      <div class="clear"></div>
      <textarea class="textarea-feedback" required="" name="text" rows="8" cols="40"></textarea>
      <input class="feedback-submit" type="submit" value="Отправить сообщение">
      {{ Form::close() }}
      <div class="clear"></div>
    </div>
  </div>
</div>
