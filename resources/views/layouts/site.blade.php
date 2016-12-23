@extends('layouts.main')

@section('common-content')
<div class="site-wrapper">
  <div class="main-wrapper">
      <div class="conteiner">
        @include('../helpers.sidebar_main')
      </div>
  </div>
        @section('site-content')
        @show
        <div class="clear">

        </div>
</div>
<meta name="sortSort" content="{{ $sortSorting }}">
<meta name="colorSort" content="{{ $colorSorting }}">
<meta name="styleSort" content="{{ $styleSorting }}">
<meta name="roomSort" content="{{ $roomSorting }}">
<meta name="tagSort" content="{{ $tagSorting }}">
@endsection
