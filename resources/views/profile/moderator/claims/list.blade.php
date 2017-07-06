@extends('profile.layout')
@section('profile-content')
    <h3 class="liked-title margin-bottom-10">Претензии</h3>
    @include('profile.elements.success_alert')
    <table class="uk-table uk-table-striped">
        <thead>
        <td><b>#</b></td>
        <td><b>Текст</b></td>
        <td><b>Файл</b></td>
        <td><b>Пользователь</b></td>
        <td><b>Пост</b></td>
        <td><b>Автор</b></td>
        <td><b>Дата</b></td>
        <td><b>Действия</b></td>
        </thead>
        @foreach ( $claims as $claim)
            <tr>
                <td>{{ $claim->id }}</td>
                <td>{{ $claim->text }}</td>
                <td><img class="uk-thumbnail uk-thumbnail-mini" src="{{ Storage::url($claim->file) }}" alt=""></td>
                <td>
                    {{ $claim->user->name }}
                </td>
                <td>
                    <img class="uk-thumbnail uk-thumbnail-mini" src="{{ Storage::url($claim->post->img_mini) }}" alt="">
                </td>
                <td>
                    {{ $claim->post->user->name }}
                </td>
                <td>
                    @php setlocale(LC_TIME, 'ru_RU.utf8') @endphp
                    {{ $claim->date->formatLocalized('%A %d %B %Y') }}
                </td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-success" href="{{ route('changeClaims', ['id' => $claim->id] )}}" title="проверено" >
                        <i class="uk-icon-check"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteClaims', ['id' => $claim->id] ) }}" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $claims->render() }}
@endsection