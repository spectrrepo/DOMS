@extends('layouts.main')

@section('common-content')
<div class="site-wrapper">
<div class="conteiner">
  @if (URL::current() != URL::to('http://localhost:8000/news'))
    @include('../helpers.sidebar_main')
  @endif
  <div class="clear"></div>
</div>
  @section('site-content')
  @show
  <div class="clear"></div>
</div>
@if ( URL::current() != URL::to('http://localhost:8000/news'))
  <meta name="sortSort" content="{{ $sortSorting }}">
  <meta name="colorSort" content="{{ $colorSorting }}">
  <meta name="styleSort" content="{{ $styleSorting }}">
  <meta name="roomSort" content="{{ $roomSorting }}">
  <meta name="tagSort" content="{{ $tagSorting }}">
@endif
@endsection
