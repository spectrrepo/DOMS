@extends('layouts.profile')
@section('profile-content')
{{ Form::open(array('url' => '/edit_news/'.$news->id, 'files' => 'true'))}}
  <input class="title-add-news" type="text" name="title" value="{{$news->title}}" placeholder="заголовок новости">
  <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
      <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
      <span class="add-photo-text">Добавить изображение</span>
      <input id="file" class="dwnld-file-input" type="file" name="main_photo">
  </div>
  <textarea class="min-description-news" name="min_description" placeholder="текст превью">{{$news->description}}</textarea>
  <textarea class="full-description-news" name="full_description" placeholder="полный текст">{{$news->full_description}}</textarea>
  <div id="wrap-d">
    <div class="wrap-dwnld-photo">
        <span class="add-photo-ico racurs-margin-ico uk-icon-justify uk-icon-camera"></span>
        <span class="add-photo-text racurs-margin-text">Добавить ракурсы</span>
        <input id="files" class="input-dwnld-view-photo" type="file" name="variants[]" multiple>
    </div>
  </div>
  <button class="btn-dwnld" type="submit" name="button">
    <span class="save-text">Сохранить изменения</span>
    <span class="save-ico uk-icon-justify uk-icon-save"></span>
  </button>
{{ Form::close()}}
@endsection
