@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Редактировать цвет</h3>
    @include('profile.elements.validate')
    {{ Form::open(['class' => 'uk-form uk-form-horizontal', 'method' => 'post', 'route' => ['editColor', $color->id]]) }}
    <fieldset data-uk-margin>
        <div class="uk-grid uk-margin">
            <br>
            <div class="uk-margin uk-width-1-2">
                <div class="uk-width-1-1 uk-margin text-center">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Название цвета</label>
                        <div class="uk-form-controls">
                            <input class="uk-width-1-1" type="text" name="title" value="{{ $color->title }}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin text-center">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Значение</label>
                        <div class="uk-form-controls">
                            <input class="uk-width-1-1" type="color" name="hash" value="{{ $color->hash }}">
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