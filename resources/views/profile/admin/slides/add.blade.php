@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Цвета</h3>
    {{ Form::open(['class' => 'uk-form', 'method' => 'post', 'route' => ['answerFeedback', $message->id]]) }}
    <fieldset data-uk-margin>
        <div class="uk-grid">
            <div class="uk-form-row uk-width-1-1">
                <label class="uk-form-label" for="">Ваш ответ</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-1-1" name="answer" id="" cols="30" rows="10"></textarea>
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
    текст
    изображение
@endsection