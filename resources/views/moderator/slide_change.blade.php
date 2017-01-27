@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Сообщения</h3>
<div class="wrap-add-sort">
  {{ Form::open(array('url' => '/add_slide', 'files' => 'true'))}}
  <input class="inp-add-sort" type="text" name="text" placeholder="Введите описание слайда">
  <input class="inp-add-sort" type="file" name="photo">
  <button type="submit" class="btn-sub-add-sort uk-icon-justify uk-icon-plus"></button>
  <div class="clear"></div>
  {{ Form::close()}}
</div>
@foreach ($slides as $slide)
<div class="item-admin-row">
  {{ Form::open(array('url' => '/edit_slide', 'files' => 'true'))}}
  <div class="cell-item-admin id-cell">
    {{ $slide->id }}
  </div>
  <div class="cell-item-admin id-cell">
    <img src="{{ $slide->photo }}"/>
  </div>
  <div class="cell-item-admin id-cell">
    <input type="file" name="photo" value="">
  </div>
  <div class="cell-item-admin title-cell">
    <input type="text" name="text" value="{{ $slide->text }}">
  </div>
  <div class="cell-item-admin cell-for-btn">
    <input type="hidden" name="id" value="{{ $slide->id }}">
    <button class="btn-cell uk-icon-justify uk-icon-edit" type="submit"></button>
  </div>
  {{ Form::close()}}
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url' => '/delete_slide'))}}
    <input type="hidden" name="id" value="{{ $slide->id }}">
    <button class="btn-cell uk-icon-justify uk-icon-remove" type="submit"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>
@endforeach

{{ $slides->render() }}
@endsection
