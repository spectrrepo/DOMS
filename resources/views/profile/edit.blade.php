@extends('layouts.profile')
@section('profile-content')
<h3>Редактирование</h3>
<div class="">
  {{ Form::open( array('url' => '/update/profile') ) }}
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="text" name="sex" value="{{ $user->sex }}">
    <input type="text" name="phone" value="{{ $user->phone }}">
    <input type="text" name="e_mail" value="{{ $user->e_mail }}">
    <input type="text" name="status" value="{{ $user->status }}">
    <input type="text" name="skype" value="{{ $user->skype }}">
    <input type="text" name="soc_net" value="{{ $user->soc_net }}">
    <input type="text" name="portret" value="{{ $user->portret }}">
    {{Form::submit('save')}}
  {{ Form::close() }}
</div>
@endsection
