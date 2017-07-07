@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Стили
        <a class="uk-float-right uk-button uk-button-success" href="{{ route('addStylePage') }}">
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
        @foreach ( $styles as $style)
            <tr>
                <td>{{ $style->id }}</td>
                <td>{{ $style->title }}</td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-primary" href="{{ route('editStylePage', ['id' => $style->id]) }}" title="редактировать">
                        <i class="uk-icon-pencil"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteStyle', ['id' => $style->id]) }}" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection