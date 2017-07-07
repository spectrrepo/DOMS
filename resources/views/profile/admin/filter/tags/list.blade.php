@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Теги
        <a class="uk-float-right uk-button uk-button-success" href="{{ route('addTagPage') }}">
            <i class="uk-icon-pencil"></i>
            Добавить
        </a>
    </h3>
    @include('profile.admin.filter.subnav')
    <table class="uk-table uk-table-striped">
        <thead>
        <td><b>#</b></td>
        <td><b>Название</b></td>
        <td><b>Действия</b></td>
        </thead>
        @foreach ( $tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->value }}</td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-primary" href="{{ route('editTagPage', ['id' => $tag->id]) }}" title="редактировать">
                        <i class="uk-icon-pencil"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteTag', ['id' => $tag->id]) }}" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection