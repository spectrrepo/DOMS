@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Цвета
        <a class="uk-float-right uk-button uk-button-success" href="{{ route('addColorPage') }}">
            <i class="uk-icon-pencil"></i>
            Добавить
        </a>
    </h3>
    @include('profile.admin.filter.subnav')
    <table class="uk-table uk-table-striped">
        <thead>
        <td><b>#</b></td>
        <td><b>Цвет</b></td>
        <td><b>Действия</b></td>
        </thead>
        @foreach ( $colors as $color)
            <tr>
                <td>{{ $color->id }}</td>
                <td>
                    <div class="uk-badge" style="background: {{ $color->hash }};">
                        {{ $color->title }}
                    </div>
                </td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-primary" href="{{ route('editColorPage', ['id' => $color->id]) }}" title="редактировать">
                        <i class="uk-icon-pencil"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteColor', ['id' => $color->id]) }}" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection