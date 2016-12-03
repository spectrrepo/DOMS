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
<a href="/profile/admin/add_style_item" class="add-btn-admin">
  <span class="uk-icon-justify uk-icon-plus"></span>
  <span class="">Добавить</span>
</a>
@foreach ($styles as $style)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $style->id}}
  </div>
  <div class="cell-item-admin img-cell">
    <img class="img-inside-cell" src="{{ $style->photo->url('max')}}" alt="" />
  </div>
  <div class="cell-item-admin title-cell">
  {{ $style->name}}
  </div>
  <div class="cell-item-admin cell-for-btn">
    <a href="/profile/admin/edit_page_styles/{{$style->id}}">
      <button type="submit" class="btn-cell uk-icon-justify uk-icon-pencil" title="редактировать"></button>
    </a>
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url' => '/delete_style/'.$style->id.''))}}
    <button type="submit" class="btn-cell uk-icon-justify uk-icon-remove" title="удалить"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>

@endforeach
{{ $styles->render() }}
@endsection
