@extends('layouts.profile')
@section('profile-content')
<div class="wrap-personal-news">
  <div class="b-setting-switcher">
    <ul class="switcher">
      <li class="item-swicher"><a href="/profile/admin/rooms_edit">Комнаты</a></li>
      <li class="item-swicher item-switcher-active"><a href="/profile/admin/styles_edit">Стили</a></li>
      <li class="item-swicher"><a href="/profile/admin/tags_edit">Тэги</a></li>
      <div class="clear"></div>
    </ul>
  </div>
</div>
<a class="add-btn-admin">
  <span class="uk-icon-justify uk-icon-plus"></span>
  <span class="">Добавить</span>
</a>
@foreach ($styles as $style)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $style->id}}
  </div>
  <div class="cell-item-admin">
  </div>
  <div class="cell-item-admin">
  {{ $style->name}}
  </div>
  <div class="cell-item-admin">
  {{ $style->description }}
  </div>
  <input type="submit" name="name">
  <div class="clear"></div>
</div>

@endforeach
{{ $styles->render() }}
@endsection
