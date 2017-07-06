@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Помещения
        <a class="uk-float-right uk-button uk-button-success">
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
        @foreach ( $placements as $placement)
            <tr>
                <td>{{ $placement->id }}</td>
                <td>{{ $placement->title }}</td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-primary" title="редактировать">
                        <i class="uk-icon-pencil"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection