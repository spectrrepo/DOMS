<div id="modalLaw" class="modal-law">
  <div class="header-modal-law">
    <span class="title-modal-law">Заявить права на фотографию</span>
    <span id="close-modal-law"></span>
  </div>
  {{ Form::open(array('id' => 'formPretense', 'files' => 'true')) }}
  <div class="body-modal-law">
    <textarea class="text-pretense" name="text_pretense"></textarea>
    <input type="hidden" name="post_id" value="{{ $image->id }}">
  </div>
  <hr>
  <div class="footer-modal-law">
    <button class="submit-pretense" name="button" type="submit">Отправить</button>
    <div class="wrap-file-modal-law uk-icon-plus">
      <input id="pretense-file" class="dwnld-file-input" type="file" name="file_pretense" value="">
    </div>
    <div class="clear"></div>
  </div>
  {{ Form::close() }}
</div>
