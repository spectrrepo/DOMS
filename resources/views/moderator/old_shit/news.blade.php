@extends('layouts.profile')
@section('profile-content')
<h3>asdciuuuuupo[lkad</h3>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            fdsfdkslfkd;lsfkldsk;flkdlskf;l
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>fdsjfjdsflsdlfdlsk</h3>
{{ Form::open(array('url' => '/add', 'files' => 'true'))}}
  <input class="title-add-news" type="text" name="title" placeholder="заголовок новости">
  <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
      <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
      <span class="add-photo-text">Добавить изображение</span>
      <input id="file" class="dwnld-file-input" type="file" name="main_photo">
  </div>
  <textarea class="min-description-news" name="min_description" placeholder="текст превью"></textarea>
  <textarea class="full-description-news" name="full_description" placeholder="полный текст"></textarea>
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
