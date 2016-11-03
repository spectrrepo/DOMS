<div class="overlay">
  <div class="modal modal-feedback">
    <span class="close"></span>
    <span class="title-link">Контакты</span>
    <div class="modal-feedback-center">
      <p>
        По вопросам сотрудничества пишите нам на адрес
        <a href="mailto:domspectr@gmail.com">domspectr@gmail.com</a>
        или отправьте сообщение с помощью формы обратной связи:
      </p>
      <div class="clear"></div>
      <div class="b-soc-set-round">
        <span class="round-fb"></span>
        <span class="round-vk"></span>
      </div>
      <div class="clear"></div>
      {{ Form::open() }}
      <input class="input-feedback left" type="text" name="name" value="" placeholder="Имя">
      <input class="input-feedback right" type="text" name="name" value="" placeholder="E-mail">
      <div class="clear"></div>
      <textarea class="textarea-feedback" name="name" rows="8" cols="40"></textarea>
      <input class="feedback-submit" type="button" name="name" value="Отправить сообщение">
      {{ Form::close() }}
    </div>
  </div>
</div>
