@extends('layouts.profile')
@section('profile-content')
  <div class="message-user">
    <div class="name-message-user">
      {{ $message->name }}
    </div>
    <div class="email-message-user">
      {{ $message->email }}
    </div>
    <div class="clear"></div>
    <div class="text-message-user">
      {{ $message->text_message }}
    </div>
  </div>
{{ Form::open(array('url' => '/answer_mail'))}}
  <input class="title-add-news" type="text" name="thema" placeholder="тема сообщения">
  <input type="hidden" name="id" value="{{ $message->id }}">
  <textarea class="full-description-news mail-texarea" name="text" placeholder="текст сообщения"></textarea>
  <button class="btn-dwnld" type="submit" name="button">
    <span class="save-text">Ответить</span>
    <span class="save-ico uk-icon-justify uk-icon-save"></span>
  </button>
{{ Form::close()}}
@endsection
