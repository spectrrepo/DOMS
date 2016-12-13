@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Комментарии</h3>
@foreach ($comments as $comment)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $comment->id}}
  </div>
  <div class="cell-item-admin img-cell">
    <img class="img-inside-cell" src="{{ $comment->comments->url('max')}}" alt="" />
  </div>
  <div class="cell-item-admin title-cell">
    {{ $comment->title}}
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url' => '/delete_comments/'.$comment->id.''))}}
    <button type="button" class="btn-cell uk-icon-justify uk-icon-remove" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>
@endforeach
@endsection
