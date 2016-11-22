@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title">Новости</h3>
<a class="add-btn-admin">
  <span class="uk-icon-justify uk-icon-plus"></span>
  <span class="">Добавить</span>
</a>
{{ Form::open(array('url' => '/add_news', 'files' => 'true'))}}
  <input type="file" name="main_photo">
  <input type="text" name="title">
  <textarea name="min_description"></textarea>
  <textarea name="full_description"></textarea>
  <input type="file" name="variants[]" multiple>
  <input type="submit" value="Cохранить">
{{ Form::close()}}
@endsection
