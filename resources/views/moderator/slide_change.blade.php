@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Сообщения</h3>
<div class="wrap-add-sort">
  {{ Form::open(array('url' => '/add_rooms'))}}
  <input class="inp-add-sort" type="text" name="title" placeholder="введите название комнаты">
  <button type="submit" class="btn-sub-add-sort uk-icon-justify uk-icon-plus"></button>
  <div class="clear"></div>
  {{ Form::close()}}
</div>
@foreach ($slides as $slide)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $slide->id }}
  </div>
  <div class="cell-item-admin id-cell">
    {{ $slide->photo }}
  </div>
  <div class="cell-item-admin title-cell">
    {{ $slid->text }}
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array())}}
    <button type="button" class="btn-cell uk-icon-justify uk-icon-remove" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array())}}
    <button type="button" class="btn-cell uk-icon-justify uk-icon-remove" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>
@endforeach

{{ $slides->render() }}
@endsection
