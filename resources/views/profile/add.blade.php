@extends('layouts.profile')
@section('profile-content')
<div class="big-col">
        <div class="help-text">Для удобства поиска твоего изображения на сайте заполни ка можно больше параметров</div>
        <div class="b-dwnld-img">
          {{ Form::open(array('url' => '/add_photo', 'files' => 'true')) }}
            <input type="hidden" name="user_upload_id" value="{{$user->id}}">
            <input type="hidden" name="author_id" value="{{$user->id}}">
            <input class="input-title-dwnld"type="text" name="title" placeholder="Заголовок">
            <div class="wrap-main-dwnld-photo" title="Добавить изображение">
                <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
                <span class="add-photo-text">Добавить изображение</span>
                <?= Form::file('photo', array('class' => 'dwnld-file-input' )) ?>
            </div>
            <textarea class="input-descreption"type="text" name="description" placeholder="Описание"></textarea>
            <div class="title-choose-color">Укажи основные цвета</div>
            <div class="color-place">
                @foreach ( $colors as $color)
                    <div class="wrap-color-input">
                      <input class="color-photo-choose" type="radio" name="color" value="{{ $color->id }}" />
                      <div class="b-color-input" id="color_{{ $color->title }}" style="background:{{ $color->RGB}}"></div>
                    </div>
                @endforeach
                <div class="clear"></div>
            </div>
            <div class="wrap-dwnld-photo">
                <span class="add-photo-ico racurs-margin-ico uk-icon-justify uk-icon-camera"></span>
                <span class="add-photo-text racurs-margin-text">Добавить ракурсы</span>
                <input class="input-dwnld-view-photo" type="file" name="name" value="">
            </div>
            <div class="wrap-add-tag">
              <div class="label-tag-input">Теги</div>
              <input class="input-tag-name" type="text" name="name" placeholder="Введите тег">
              <button class="btn-add-tag uk-icon-justify uk-icon-plus" type="button" name="button"></button>
            </div>
            <button class="btn-dwnld" type="submit" name="button">
              <span class="save-text">Сохранить изменения</span>
              <span class="save-ico uk-icon-justify uk-icon-save"></span>
            </button>
        </div>
    </div>
    <div class="small-col">
      <div class="title-tag-list">
        Стили
      </div>
      <div class="tags-list">
        @foreach ( $styles as $style )
          <div class="wrap-tags-list-item">
            <input class="opacity-radio" type="radio" name="style" value=" {{ $style->id }} ">
            <div class="tags-list-item">
              {{ $style->name }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="small-col">
      <div class="title-tag-list">
        Помещения
      </div>
      <div class="tags-list">
        @foreach ( $rooms as $room )
        <div class="wrap-tags-list-item">
          <input class="opacity-radio" type="radio" name="room" value=" {{ $room->id }} ">
          <div class="tags-list-item">
            {{ $room->title }}
          </div>
        </div>
        @endforeach
      </div>
    </div>
    {{ Form::close() }}
  </div>
  @endsection
