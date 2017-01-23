<div id="modalLaw" class="modal-law">
  <div class="header-modal-law">
    <span class="title-modal-law">Заявить права на фотографию</span>
    <span id="close-modal-law"></span>
  </div>
  {{ Form::open(array('id' => 'formPretense')) }}
  <div class="body-modal-law">
    <textarea class="text-pretense" name="name"></textarea>
  </div>
  <hr>
  <div class="footer-modal-law">
    <button class="submit-pretense" name="button" type="submit">Отправить</button>
    <div class="wrap-file-modal-law uk-icon-plus">
      <input id="pretense-file" class="dwnld-file-input" type="file" name="name" value="">
    </div>
    <div class="clear"></div>
  </div>
  {{ Form::close() }}
</div>
