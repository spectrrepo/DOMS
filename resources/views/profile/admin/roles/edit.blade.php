@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Редактировать роль</h3>
    @include('profile.elements.validate')
    {{ Form::open(['class' => 'uk-form uk-form-horizontal', 'method' => 'post', 'route' => ['editRolesPage', $role->id], 'files' => true ])}}
    <fieldset data-uk-margin>
        <div class="uk-grid uk-margin">
            <br>
            <div class="uk-margin uk-width-1-2">
                <div class="uk-width-1-1 uk-margin text-center">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Название роли</label>
                        <div class="uk-form-controls">
                            <input class="uk-width-1-1" type="text" name="name" value="{{ $role->name }}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin text-center">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Изображение</label>
                        <div class="uk-form-controls">
                            <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
                                <input id="file" class="dwnld-file-input" type="file" name="img">
                                <span>
                                    <img class="img-full-width" src="{{ Storage::url($role->img) }}">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin text-center">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="">Описание</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-width-1-1" name="text" id="" cols="30" rows="10">
                                {{ $role->text }}
                            </textarea>
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
