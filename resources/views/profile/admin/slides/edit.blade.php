@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Редактировать слайд</h3>
    @include('profile.elements.validate')
    {{ Form::open(['class' => 'uk-form', 'method' => 'post', 'route' => ['editSlide', $slide->id], 'files' => true]) }}
    <fieldset data-uk-margin>
        <div class="uk-margin uk-width-1-2">
            <div class="uk-width-1-1 uk-margin text-center">
                <label class="uk-form-label" for="">Текст</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-1-1" name="text" id="" cols="30" rows="10">{{ $slide->text }}</textarea>
                </div>
            </div>
        </div>
        <div class="uk-margin uk-width-1-2">
            <div class="uk-width-1-1 uk-margin text-center">
                <label class="uk-form-label" for="">Изображение</label>
                <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
                    <input id="file" class="dwnld-file-input" type="file" name="img">
                    <span>
                        <img class="img-full-width" src="{{Storage::url($slide->img)}}">
                    </span>
                </div>
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