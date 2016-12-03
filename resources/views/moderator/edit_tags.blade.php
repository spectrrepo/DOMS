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
<div class="wrap-add-sort">
  {{ Form::open(array('url' => '/add_tags'))}}
  <input class="inp-add-sort" type="text" name="title" placeholder="введите тег">
  <button type="submit" class="btn-sub-add-sort uk-icon-justify uk-icon-plus"></button>
  {{ Form::close()}}
  <div class="clear"></div>
</div>
@foreach ($tags as $tag)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $tag->id}}
  </div>
  <div class="cell-item-admin title-cell">
    {{ Form::open(array('url' => '/edit_tag/'.$tag->id.''))}}
    <input class="inp-edit-list" type="text" name="title-tag" value="{{ $tag->title }}">
    <button type="submit" class="submit-edit-list uk-icon-justify uk-icon-pencil btn-cell" title="удалить"></button>
    {{ Form::close()}}
  </div>
  <div class="cell-item-admin">
    {{ Form::open(array('url' => '/delete_tag/'.$tag->id.''))}}
    <button type="submit" class="uk-icon-justify uk-icon-remove btn-cell" title="удалить"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>
@endforeach
{{ $tags->render() }}
@endsection
