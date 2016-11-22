@extends('layouts.profile')
@section('profile-content')
<div class="wrap-personal-news">
  <div class="b-setting-switcher">
    <ul class="switcher">
      <li class="item-swicher"><a href="/profile/admin/rooms_edit">Комнаты</a></li>
      <li class="item-swicher"><a href="/profile/admin/styles_edit">Стили</a></li>
      <li class="item-swicher item-switcher-active"><a href="/profile/admin/tags_edit">Тэги</a></li>
      <div class="clear"></div>
    </ul>
  </div>
</div>
<a class="add-btn-admin">
  <span class="uk-icon-justify uk-icon-plus"></span>
  <span class="">Добавить</span>
</a>
@foreach ($tags as $tag)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $tag->id}}
  </div>
  <div class="cell-item-admin">
   <input type="text" name="name" value="">
  </div>
  <input type="submit" name="name">
  <div class="clear"></div>
</div>
<input type="submit" name="name" value="">
<h1>{{$tag->id}}</h1>
@endforeach
{{ $tags->render() }}
@endsection
