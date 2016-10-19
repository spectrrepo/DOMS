@extends('layouts.profile')
@section('profile-content')
  <div class="wrap-personal-information">
    {{ Form::open( array('url' => '/update/profile') ) }}
      <div class="b-photo-person">
          <img src=" {{ $user->portret }} " alt="user_{{ $user->id }} " />
          <input type="text" name="portret" value="{{ $user->portret }}">
      </div>
      <div class="b-persobal-information">
          <div class="b-name-person">
            <input type="text" name="name" value="{{ $user->name }}">
          </div>
          <div class="b-role-person">
            <input type="text" name="status" value="{{ $user->status }}">
          </div>
          <div class="b-contact-data">
            <input type="text" name="sex" value="{{ $user->sex }}">

            <div class="contact-item">
                <span class="contact-item-name">email</span>
                <input type="text" name="e_mail" value="{{ $user->e_mail }}">
            </div>
            <div class="contact-item">
                <span class="contact-item-name">skype</span>
                <input type="text" name="skype" value="{{ $user->skype }}">
            <div class="contact-item">
                <span class="contact-item-name">телефон</span>
                <span class="contact-item-value"> {{ $user->skype }} </span>
                <input type="text" name="skype" value="{{ $user->phone }}">
            </div>
            <div class="contact-item">
                <span class="contact-item-name">соц.сети</span>
                <input type="text" name="soc_net" value="{{ $user->soc_net }}">
            </div>
          </div>
      </div>
      {{ Form::close() }}
  </div>

    {{Form::submit('save')}}
@endsection
