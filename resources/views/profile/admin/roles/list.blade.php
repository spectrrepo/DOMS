@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Роли пользователей</h3>
    <table class="uk-table uk-table-striped">
        <thead>
            <td><b>#</b></td>
            <td><b>Название роли</b></td>
            <td><b>Изображение</b></td>
            <td><b>Описание</b></td>
            <td><b>Действия</b></td>
        </thead>
        @foreach ( $roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <img class="uk-thumbnail uk-thumbnail-mini" src="{{ Storage::url($role->img) }}">
                </td>
                <td>{{ $role->text }}</td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-primary" href="{{ route('editRolesPage', ['id' => $role->id]) }}" title="редактировать">
                        <i class="uk-icon-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection