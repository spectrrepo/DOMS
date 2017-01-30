@extends('layouts.main')

@section('common-content')
<div class="site-wrapper">
<div class="conteiner">
  @if (!(preg_match('[/news]', URL::current())))
    @include('../helpers.sidebar_main')
  @endif
  <div class="clear"></div>
</div>
  @section('site-content')
  @show
  <div class="clear"></div>
</div>
@if (!(preg_match('[/news]', URL::current())))
  <meta name="sortSort" content="{{ $sortSorting }}">
  <meta name="colorSort" content="{{ $colorSorting }}">
  <meta name="styleSort" content="{{ $styleSorting }}">
  <meta name="roomSort" content="{{ $roomSorting }}">
  <meta name="tagSort" content="{{ $tagSorting }}">
@endif
@endsection
