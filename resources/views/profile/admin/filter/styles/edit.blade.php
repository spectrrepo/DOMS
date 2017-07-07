@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Редактировать стиль</h3>
    @include('profile.elements.validate')
    {{ Form::open(['class' => 'uk-form uk-form-horizontal', 'method' => 'post', 'route' => ['editStyle', $style->id], 'files' => true]) }}
    <fieldset data-uk-margin>
        <div class="uk-grid uk-margin">
            <br>
            <div class="uk-margin uk-width-1-2">
                <div class="uk-width-1-1 uk-margin text-center">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Название</label>
                        <div class="uk-form-controls">
                            <input class="uk-width-1-1" type="text" name="title" value="{{ $style->title }}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin text-center">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Кртакое описание</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-width-1-1" name="description">{{ $style->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Изображение</label>
                        <div class="uk-form-controls">
                            <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
                                <span class="add-photo-ico uk-icon-justify uk-icon-camera"></span>
                                <span class="add-photo-text">Добавить изображение</span>
                                <input id="file" class="dwnld-file-input" type="file" name="img">
                                <span>
                                    <img class="img-full-width" src="{{ Storage::url($style->img_middle) }}">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Полный описание</label>
                        <div class="uk-form-controls">
                            <textarea id="full_description" name="full_description">{{ $style->full_description }}</textarea>
                            @ckeditor('full_description')
                        </div>
                    </div>
                </div>
                <button class="uk-button uk-button-success uk-width-1-1">
                    Сохранить
                </button>
            </div>
        </div>
    </fieldset>
    {{ Form::close() }}
@endsection