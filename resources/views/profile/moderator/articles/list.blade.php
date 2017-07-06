@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Новости
        <a class="uk-float-right uk-button uk-button-success" href="{{ route('addArticlePage') }}">
            <i class="uk-icon-pencil"></i>
            Добавить
        </a>
    </h3>
    <table class="uk-table uk-table-striped">
        <thead>
            <td><b>#</b></td>
            <td><b>Заголовок</b></td>
            <td><b>Изображение</b></td>
            <td><b>Имя пользователя</b></td>
            <td><b>Когда добавлен</b></td>
            <td><b>Действия</b></td>
        </thead>
        @foreach ( $articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>
                    <img class="uk-thumbnail uk-thumbnail-mini" src="{{ Storage::url($article->img_middle) }}">
                </td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @php setlocale(LC_TIME, 'ru_RU.utf8') @endphp
                    {{ $article->date->formatLocalized('%A %d %B %Y') }}
                </td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-primary" href="{{ route('editArticlePage', ['id' => $article->id]) }}" title="редактировать">
                        <i class="uk-icon-pencil"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteArticle', ['id' => $article->id]) }}"title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $articles->render() }}
@endsection