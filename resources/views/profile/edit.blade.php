@extends('layouts.profile')
@section('profile-content')
  <div class="wrap-personal-information">
    {{ Form::open( array('url' => '/update/profile') ) }}
      <div class="b-photo-person">
          <img src=" {{ $user->portret }} " alt="user_{{ $user->id }} " />
          <input type="file" name="portret" value="{{ $user->portret }}">
          <div class="">
            <span></span>
          </div>
      </div>
      <div class="b-persobal-information">
          <div class="b-common-person-information">
            <input class="input-name-pers" type="text" name="name" value="{{ $user->name }}">
            <div class="wrap-sex">
              <div class="b-item-sex left-item-sex">
                <input class="opacity-radio" type="radio" name="name" value="">
                <div class="sex-name">Мужской</div>
              </div>
              <div class="b-item-sex right-item-sex">
                <input class="opacity-radio" type="radio" name="name" value="">
                <div class="sex-name">Женский</div>
              </div>
            </div>
            <textarea class="about-user-text" name="name"></textarea>
          </div>
          <div class="b-spec-info">
            <span class="contact-item-name">email</span>
            <input class="contact-item-value" type="text" name="e_mail" value="{{ $user->e_mail }}">
            <span class="contact-item-name">skype</span>
            <input class="contact-item-value" type="text"type="text" name="skype" value="{{ $user->skype }}">
            <span class="contact-item-name">телефон</span>
            <input class="contact-item-value" type="text" name="phone" value="{{ $user->phone }}">
            <span class="contact-item-name">соц.сети</span>
            <input class="contact-item-value" type="text"type="text" name="soc_net" value="{{ $user->soc_net }}">
          </div>
          {{Form::submit('Сохранить', array('class' => 'save-info-user'))}}
      </div>
      {{ Form::close() }}
  </div>

@endsection
