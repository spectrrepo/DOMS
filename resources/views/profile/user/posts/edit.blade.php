@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.validate')
    <div class="big-col uk-clearfix">
        @include('profile.user.posts.el_forms.edit.user')
        <div class="help-text">Для удобства поиска твоего изображения на сайте заполни ка можно больше параметров</div>
        <div class="b-dwnld-img">
            {{ Form::open(['route' => ['editPost', $post->id], 'method' => 'post', 'files' => 'true'])}}
            <input class="input-title-dwnld" type="text" name="title" placeholder="Заголовок" value="{{ $post->title }}">
            <div id="main-wrap-photo" class="wrap-main-dwnld-photo" title="Добавить изображение">
                <img src="{{ (Storage::url($post->img_middle)) }}">
                <input id="file" class="dwnld-file-input" type="file" name="photo">
            </div>
            <textarea class="input-descreption" name="description" placeholder="Описание">
              {{$post->description}}
            </textarea>
            @include('profile.user.posts.el_forms.edit.colors', ['colors' => $colors, 'post' => $post])
            @include('profile.user.posts.el_forms.edit.racourse', ['post' => $post])
            <hr>
            @include('profile.user.posts.el_forms.edit.tags')
            <button class="btn-dwnld" type="submit" name="button">
                <span class="save-text">Сохранить изменения</span>
                <span class="save-ico uk-icon-justify uk-icon-save"></span>
            </button>
        </div>
    </div>
    @include('profile.user.posts.el_forms.edit.styles')
    @include('profile.user.posts.el_forms.edit.placements')
    <div class="clear"></div>
    @include('profile.user.posts.el_forms.edit.edit_btn')
@endsection
