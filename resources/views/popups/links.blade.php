<div id="dialogLinkAdd" class="overlay">
  <div class="mini-modal">
    <span class="close uk-icon-justify uk-icon-remove" id="closeLink"></span>
    <h3 class="title-form">Заголовко заголовков</h3>
    {{ Form::open(array('class' => 'links-control')) }}
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="old_link">
    <input class="mini-modal-inp" type="text" name="link" placeholder="Ссылка на социальную сеть">
    <button class="mini-modal-submit" type="submit" class=""></button>
    {{ Form::close() }}
  </div>
</div>
