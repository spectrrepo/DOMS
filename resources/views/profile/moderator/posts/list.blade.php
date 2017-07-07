@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Все интерьеры</h3>
    <table class="uk-table uk-table-striped">
        <thead>
        <td><b>#</b></td>
        <td><b>Изображение</b></td>
        <td><b>Имя пользователя</b></td>
        <td><b>Когда добавлен</b></td>
        <td><b>Действия</b></td>
        </thead>
        @foreach ( $posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    <img class="uk-thumbnail uk-thumbnail-mini" src="{{ Storage::url($post->img_mini) }}">
                </td>
                <td>{{ $post->user->name }}</td>
                <td>
                    @php setlocale(LC_TIME, 'ru_RU.utf8') @endphp
                    {{ $post->created_at->formatLocalized('%A %d %B %Y') }}
                </td>
                <td>
                    @if($post->status !== 1)
                        <a class="uk-button uk-border-circle uk-button-primary"  href="{{ route('editPostPage', ['id' => $post->id]) }}"  title="проверить">
                            <i class="uk-icon-eye"></i>
                        </a>
                    @endif
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteVerPost', ['id' => $post->id]) }}" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $posts->render() }}
@endsection