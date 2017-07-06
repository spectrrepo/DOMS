@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Добавить новость</h3>
    @include('profile.elements.validate')
    {{ Form::open(['class' => 'uk-form', 'method' => 'post', 'route' => 'editArticle', 'files' => true]) }}
    <fieldset data-uk-margin>
        <div class="uk-grid">
            <div class="uk-width-1-2">
                <div class="uk-form-row">
                    <label class="uk-form-label" for="">Заголовок</label>
                    <div class="uk-form-controls">
                        <input class="uk-width-1-1" type="text" name="title" value="{{ $article->title }}">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="">Текст превью</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-width-1-1" name="description" id="" cols="30" rows="10">{{ $article->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-2">
                <div class="uk-form-row">
                    <label class="uk-form-label" for="">Изображение</label>
                    <div class="uk-form-controls">
                        <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
                            <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
                            <span class="add-photo-text">Добавить изображение</span>
                            <input id="file" class="dwnld-file-input" type="file" name="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--TODO:не работает изображение --}}
        <div class="uk-form-row">
            <label class="uk-form-label" for="">Полный текст</label>
            <div class="uk-form-controls">
                <textarea id="ful_description" name="description_full">{{ $article->description_full }}</textarea>
                @ckeditor('ful_description')
            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-form-controls">
                <input type="checkbox" id="form-s-c" name="status" value="yes">
                <label for="form-s-c">Опубликовать?</label>
            </div>
        </div>
        <div class="uk-form-row">
            <button class="uk-button uk-button-success">
                Сохранить
            </button>
        </div>
    </fieldset>
    {{ Form::close() }}
@endsection