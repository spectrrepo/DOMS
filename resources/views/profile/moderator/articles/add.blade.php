@extends('layouts.profile')
@section('profile-content')
    @if (count($errors) > 0)
        <div class="uk-alert-danger" style="display: block" data-uk-alert>
            <a href="" class="uk-alert-close uk-close"></a>
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
        </div>
    @endif
    {{ Form::open(array('url' => '/add', 'files' => 'true'))}}
    <input class="title-add-news" type="text" name="title" placeholder="заголовок новости">
    <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
        <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
        <span class="add-photo-text">Добавить изображение</span>
        <input id="file" class="dwnld-file-input" type="file" name="main_photo">
    </div>
    <textarea class="min-description-news" name="min_description" placeholder="текст превью"></textarea>
    <textarea id="bodyField" name="full_description"></textarea>
    @ckeditor('bodyField')
    <button class="btn-dwnld" type="submit" name="button">
        <span class="save-text">Сохранить изменения</span>
        <span class="save-ico uk-icon-justify uk-icon-save"></span>
    </button>
    {{ Form::close()}}
@endsection
