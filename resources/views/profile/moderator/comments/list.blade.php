@extends('profile.layout')
@section('profile-content')
  <h3 class="liked-title margin-bottom-10">Комментарии</h3>
  @include('profile.elements.success_alert')
  <table class="uk-table uk-table-striped">
    <thead>
    <td><b>#</b></td>
    <td><b>Комментарий</b></td>
    <td><b>Пользователь</b></td>
    <td><b>Пост</b></td>
    <td><b>Когда добавлен</b></td>
    <td><b>Действия</b></td>
    </thead>
    @foreach ( $comments as $comment)
      <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->comment }}</td>
        <td>
          {{ $comment->user->name }}
        </td>
        <td>
          <img class="uk-thumbnail uk-thumbnail-mini" src="{{ Storage::url($comment->post->img_mini) }}" alt="">
        </td>
        <td>
          @php setlocale(LC_TIME, 'ru_RU.utf8') @endphp
          {{ $comment->date->formatLocalized('%A %d %B %Y') }}
        </td>
        <td>
          <a class="uk-button uk-border-circle uk-button-success" href="{{ route('changeStatusComment', ['id' => $comment->id] )}}" title="проверено" >
            <i class="uk-icon-check"></i>
          </a>
          <a class="uk-button uk-border-circle uk-button-danger" href="{{ route('deleteComment', ['id' => $comment->id] ) }}" title="удалить">
            <i class="uk-icon-trash-o"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </table>
  {{ $comments->render() }}
@endsection