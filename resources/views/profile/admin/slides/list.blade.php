@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Слайды
        <a class="uk-float-right uk-button uk-button-success" href="{{ route('addSlidePage') }}">
            <i class="uk-icon-pencil"></i>
            Добавить
        </a>
    </h3>
    <table class="uk-table uk-table-striped">
        <thead>
        <td><b>#</b></td>
        <td><b>Текст</b></td>
        <td><b>Изображение</b></td>
        <td><b>Имя пользователя</b></td>
        <td><b>Когда добавлен</b></td>
        <td><b>Действия</b></td>
        </thead>
        @foreach ( $slides as $slide)
            <tr>
                <td>{{ $slide->id }}</td>
                <td>{{ $slide->text }}</td>
                <td>
                    <img class="uk-thumbnail uk-thumbnail-mini" src="{{ Storage::url($slide->img) }}">
                </td>
                <td>{{ $slide->user->name }}</td>
                <td>
                    @php setlocale(LC_TIME, 'ru_RU.utf8') @endphp
                    {{ $slide->date->formatLocalized('%A %d %B %Y') }}
                </td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-primary" href="{{ route('editSlidePage', ['id' => $slide->id]) }}" title="редактировать">
                        <i class="uk-icon-pencil"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteSlide', ['id' => $slide->id]) }}" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $slides->render() }}
@endsection