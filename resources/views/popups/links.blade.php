<div id="dialogLinkAdd" class="overlay">
  <div class="mini-modal">
    <span class="close uk-icon-justify uk-icon-remove" id="closeLink"></span>
    <h3 class="title-form">Заголовко заголовков</h3>
    {{ Form::open(array('class' => 'links-control')) }}
    <input class="mini-modal-inp" type="text" name="name" placeholder="Ссылка на социальную сеть">
    <button class="mini-modal-submit" type="submit" class=""></button>
    {{ Form::close() }}
  </div>
</div>
