@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Сообщения</h3>
@foreach ($copyrights as $copyright)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $copyright->id }}
  </div>
  <div class="cell-item-admin id-cell">
    {{ $copyright->date }}
  </div>
  <div class="cell-item-admin id-cell">
    {{ $copyright->text }}
  </div>
  <div class="cell-item-admin id-cell">
    {{ $copyright->photo }}
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array())}}
    <button type="button" class="btn-cell uk-icon-justify uk-icon-remove" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="clear"></div>
</div>
@endforeach

{{ $copyrights->render() }}
@endsection
