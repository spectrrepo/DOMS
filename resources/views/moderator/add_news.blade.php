@extends('layouts.profile')
@section('profile-content')
<h3 class="liked-title margin-bottom-10">Новости</h3>
<a href="/profile/admin/add_news_item" class="add-btn-admin">
  <span class="uk-icon-justify uk-icon-plus"></span>
  <span class="">Добавить</span>
</a>
@foreach ($news as $new)
<div class="item-admin-row">
  <div class="cell-item-admin id-cell">
    {{ $new->id }}
  </div>
  <div class="cell-item-admin img-cell">
    <img class="img-inside-cell" src="{{ $new->news->url('max') }}" alt="" />
  </div>
  <div class="cell-item-admin title-cell">
    {{ $new->title }}
  </div>
  <div class="cell-item-admin cell-for-btn">
    <a href="/profile/admin/edit_page_news/{{ $new->id }}">
    <button type="button" class="btn-cell uk-icon-justify uk-icon-pencil" name="button"></button>
    </a>
  </div>
  <div class="cell-item-admin cell-for-btn">
    {{ Form::open(array('url' => '/delete_news/'.$new->id.'')) }}
    <button type="submit" class="btn-cell uk-icon-justify uk-icon-remove" name="submit"></button>
    {{ Form::close() }}
  </div>
  <div class="clear"></div>
</div>
@endforeach
@endsection
