@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.validate')
    <h3 class="liked-title margin-bottom-10">Вопрос</h3><br>
    <article class="uk-comment">
        <div class="uk-comment-header">
            <div class="uk-text-large">
                <i class="uk-icon-user uk-comment-avatar"></i> {{ $message->name }}
            </div>
            <div class="uk-comment-meta">{{ $message->date_ask }}</div>
        </div>
        <div class="uk-comment-body">
            <i class="uk-margin-small-right uk-icon-envelope-o"></i>{{ $message->message }}
        </div>
        <hr>
    </article>
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
@endsection