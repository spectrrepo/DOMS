@extends('layouts.profile')
@section('profile-content')
<!-- TODO: make that such condition for all elements and temlate, where have
content , which view other for different users@if(Auth::user()->isManager()) -->
<div class="wrap-personal-information">
    <div class="b-photo-person">
        <img src=" {{ $user->portret }} " alt="user_{{ $user->id }} " />
    </div>
    <div class="b-persobal-information">
        <div class="b-name-person">
          {{ $user->name }}
        </div>
        <div class="b-role-person">
          {{ $user->status }}
        </div>
        <div class="b-contact-data">
          <div class="contact-item">
              <span class="contact-item-name">email</span>
              <span class="contact-item-value">  </span>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">skype</span>
              <span class="contact-item-value"> {{ $user->skype }} </span>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">телефон</span>
              <span class="contact-item-value"> {{ $user->phone }} </span>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">соц.сети</span>
              <span class="contact-item-value"> {{ $user->soc_net }} </span>
          </div>
        </div>
    </div>
</div>
<div class="separate-title">
  Лента
</div>

<div class="wrap-personal-news">
    <div class="b-setting-switcher">
      <ul class="switcher">
        <li class="item-swicher">Обновления</li>
        <li class="item-swicher">Фотографии</li>
      </ul>
    </div>
    <div class="b-personal-news">
        
        <div class="b-person-post">
          <div class="col-news-min">
              <div class="b-portret-blogger"><span style="line-height: 85px;font-size: 60px;"class="uk-icon-justify uk-icon-user"></span></div>
          </div>
          <div class="col-news-big">
              <div class="b-name-redactor">Павел Воля</div>
              <div class="b-post-body">
                <div class="b-photo-post">
                  <img src="" alt="" class="img-post">
                </div>
                <div class="b-iformation">
                  <div class="b-date">
                    12 июля
                  </div>
                  <div class="b-statistics">
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-eye"></span>
                      <span class="num-stat">8</span>
                      <span class="tooltip-stat other-margin-tooltip1">
                        <span class="text-tooltip-stat">
                          количество просмотров
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-heart"></span>
                      <span class="num-stat">12</span>
                      <span class="tooltip-stat other-margin-tooltip2">
                        <span class="text-tooltip-stat">
                          понравилось
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-star"></span>
                      <span class="num-stat">2</span>
                      <span class="tooltip-stat">
                        <span class="text-tooltip-stat">
                         избранное
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    </div>
    </div>
</div>
<div class="btn-dwnld-new">
  Загрузить ещё
</div>
</div>
@endsection
