@extends('layouts.profile')
@section('profile-content')
{{ Form::open(array('url' => '/edit_style/'.$style->id, 'files' => 'true'))}}
  <input class="title-add-news" type="text" name="title" placeholder="название стиля" value="{{$style->name}}">
  <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
      <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
      <span class="add-photo-text">Добавить изображение</span>
      <input id="file" class="dwnld-file-input" type="file" name="photo">
  </div>
  <textarea class="min-description-news" name="description" placeholder="описание стиля">
    {{$style->description}}
  </textarea>
  <button class="btn-dwnld" type="submit" name="button">
    <span class="save-text">Сохранить изменения</span>
    <span class="save-ico uk-icon-justify uk-icon-save"></span>
  </button>
{{ Form::close()}}
@endsection
