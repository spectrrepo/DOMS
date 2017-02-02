@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Сообщения</h3>
@foreach ($messages as $message)
<div class="item-admin-row {{ $message->status=='not_read' ? 'none-check': '' }}">

  <div class="cell-item-admin name-cell">
    {{ $message->name }}
  </div>
  <div class="cell-item-admin id-cell">
    <a href="mailto:{{ $message->e_mail }}">{{ $message->e_mail }}</a>
  </div>
  <div class="cell-item-admin title-cell">
    {{ $message->text_message }}
  </div>
  <div class="cell-item-admin id-cell">
    {{ Form::open(array('url' => '/delete_message/'.$message->id ))}}
    <button type="submit" class="btn-cell uk-icon-justify uk-icon-remove" name="button"></button>
    {{ Form::close()}}
  </div>
  <div class="cell-item-admin id-cell">
    <a href="/profile/admin/answer_mail/{{ $message->id }}" class="btn-cell recover-submit uk-icon-justify uk-icon-reply" href="#"></a>
  </div>
  <div class="clear"></div>
</div>
@endforeach

{{ $messages->render() }}
@endsection
