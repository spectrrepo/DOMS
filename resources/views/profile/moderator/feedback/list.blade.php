@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.success_alert')
    <h3 class="liked-title margin-bottom-10">Вопросы</h3>
    <table class="uk-table uk-table-striped">
        <thead>
        <td><b>#</b></td>
        <td><b>Имя</b></td>
        <td><b>Email</b></td>
        <td><b>Вопрос</b></td>
        <td><b>Когда задан</b></td>
        <td><b>Действия</b></td>
        </thead>
        @foreach ( $feedBacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->name }}</td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->message }}</td>
                <td>
                    @php setlocale(LC_TIME, 'ru_RU.utf8') @endphp
                    {{ $feedback->date_ask->formatLocalized('%A %d %B %Y') }}
                </td>
                <td>
                    <a class="uk-button uk-border-circle uk-button-success" href="{{ route('itemFeedbackPage', ['id' => $feedback->id]) }}" title="ответить" >
                        <i class="uk-icon-pencil"></i>
                    </a>
                    <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteFeedback', ['id' => $feedback->id]) }}" title="удалить">
                        <i class="uk-icon-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $feedBacks->render() }}
@endsection