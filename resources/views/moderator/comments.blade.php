@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Комментарии</h3>
@foreach ($comments as $comment)
<div class="item-admin-row {{ $comment->status=='not_read' ? 'none-check': '' }}">
  <div class="cell-item-admin id-cell">
    {{ $comment->id}}
  </div>
  <div class="cell-item-admin img-cell">
    <img class="img-inside-cell" src="{{ $comment->min_path}}" />
  </div>
  <div class="cell-item-admin title-cell">
    {{ $comment->text_comment}}
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url' => '/delete_comments/'.$comment->id ))}}
    <button type="submit" class="btn-cell uk-icon-justify uk-icon-remove" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>
@endforeach
{{ $comments->render() }}
@endsection
