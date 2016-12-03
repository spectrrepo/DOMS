@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Ожидают пожтвержления</h3>
@foreach ($images as $image)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $image->id}}
  </div>
  <div class="cell-item-admin img-cell">
    <img class="img-inside-cell" src="{{$image->photo->url('small')}}" alt="" />
  </div>
  <div class="cell-item-admin title-cell">
    {{$image->title}}
  </div>
  <div class="cell-item-admin cell-for-btn">
    <a title="проверить" class="uk-icon-justify uk-icon-pencil btn-cell" href="/profile/admin/verification/{{$image->id}}"></a>
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url' => '/delete_verification_image/'.$image->id))}}
    <button title="удалить без проверки" type="submit" class="uk-icon-justify uk-icon-remove btn-cell"></button>
    {{ Form::close() }}
  </div>
  <div class="clear"></div>
</div>
@endforeach
{{ $images->render() }}
@endsection
