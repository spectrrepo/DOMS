@extends('layouts.profile')
@section('profile-content')
<div class="big-col">
        <div class="help-text">Для удобства поиска твоего изображения на сайте заполни ка можно больше параметров</div>
        <div class="b-dwnld-img">
          <form class="" action="index.html" method="post">
            <input class="input-title-dwnld"type="text" name="name" placeholder="Заголовок">
            <div class="wrap-main-dwnld-photo" title="Добавить изображение">
                <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
                <span class="add-photo-text">Добавить изображение</span>
                <input class="dwnld-file-input" type="file" name="name" value="">
            </div>
            <textarea class="input-descreption"type="text" name="name" placeholder="Описание"></textarea>
            <div class="title-choose-color">Укажи основные цвета</div>
            <div class="color-place">
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
                <div class="wrap-color-input">
                    <input class="color-photo-choose" type="checkbox" name="name" value="">
                </div>
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
          </form>
        </div>
    </div>
    <div class="small-col">
      <div class="title-tag-list">
        Стили
      </div>
      <div class="tags-list">
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
        <span class="tags-list-item">Авнгард</span>
      </div>
    </div>
    <div class="small-col">
      <div class="title-tag-list">
        Помещения
      </div>
      <div class="tags-list">
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
        <span class="tags-list-item">Гостинная</span>
      </div>
    </div>
  </div>
  @endsection
