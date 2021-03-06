@extends('profile.layout')
@section('profile-content')
    {{ Form::open(array('id' => 'addPhotoSite', 'route' => 'addPost', 'files' => 'true')) }}
    <div class="big-col">
        <div class="help-text">Для удобства поиска твоего изображения на сайте заполни ка можно больше параметров</div>
        <div class="b-dwnld-img">
            @include('profile.elements.validate')
            <input class="input-title-dwnld"type="text" name="title" placeholder="Заголовок">
            <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
                <span class="add-photo-ico uk-icon-justify uk-icon-plus"></span>
                <span class="add-photo-text">Добавить изображение</span>
                <input id="file" class="dwnld-file-input" type="file" name="img">
            </div>
            <textarea class="input-descreption"type="text" name="description" placeholder="Описание"></textarea>
            <div class="title-choose-color">Укажи основные цвета</div>
            <div class="color-place uk-clearfix">
                @foreach ( $colors as $color)
                    <div class="wrap-color-input">
                        <input class="color-photo-choose" type="checkbox" name="color[]" value="{{ $color->id }}" />
                        <div class="b-color-input" style="background:{{ $color->hash }}"></div>
                    </div>
                @endforeach
            </div>
            <div id="wrap-racourse">
                <div class="wrap-dwnld-photo">
                    <span class="add-photo-ico racurs-margin-ico uk-icon-justify uk-icon-plus"></span>
                    <span class="add-photo-text racurs-margin-text">Добавить ракурсы</span>
                    <input id="files" class="input-dwnld-view-photo" type="file" name="views[]">
                </div>
                <ul class="uk-list angles-list uk-grid uk-grid-width-1-3 uk-margin-remove"></ul>
            </div>
            <div class="clear"></div>
            <hr>
            <div class="wrap-add-tag">
                <div class="label-tag-input">Теги</div>
                <input class="input-tag-name" type="text" name="name" placeholder="Введите тег">
                <input type="hidden" name="data-tags" placeholder="Введите тег">
                <button class="btn-add-tag uk-icon-justify uk-icon-plus" type="button"></button>
                <div class="clear"></div>
                <hr>
                <div class="pole-tag uk-clearfix"></div>
            </div>
            <button class="btn-dwnld" type="submit" name="button" onclick="this.parentNode.submit();">
                <span class="save-text">Сохранить изменения</span>
                <span class="save-ico uk-icon-justify uk-icon-save"></span>
            </button>
        </div>
    </div>
    @include('profile.user.posts.el_forms.add.styles')
    @include('profile.user.posts.el_forms.add.placements')
    {{ Form::close() }}
@endsection
