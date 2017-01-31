@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Претензии</h3>
@foreach ($copyrights as $copyright)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $copyright->id }}
  </div>
  <div class="cell-item-admin id-cell">
    {{ $copyright->photo_pretense_updated_at->format('d M Y') }}
  </div>
  <div class="cell-item-admin message-cell">
    {{ $copyright->message }}
  </div>
  <div class="cell-item-admin id-cell">
    <img src="{{ $copyright->photo_pretense->url('max') }}"/>
  </div>
  <div class="cell-item-admin id-cell">
    {{ $copyright->user_author_id }}
  </div>
  <div class="cell-item-admin id-cell">
    {{ $copyright->user_pretense_id }}
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url'=> '/save_copyright'))}}
    <input type="hidden" name="id" value="{{ $copyright->id }}">
    <button type="submit" class="btn-cell uk-icon-justify uk-icon-save" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url'=> '/delete_copyright'))}}
    <input type="hidden" name="id" value="{{ $copyright->id }}">
    <button type="submit" class="btn-cell uk-icon-justify uk-icon-remove" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>
@endforeach

{{ $copyrights->render() }}
@endsection
