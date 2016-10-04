@extends('layouts.main')

@section('common-content')
<div class="site-wrapper">
  <div class="main-wrapper">
      <div class="conteiner">
        @include('../helpers.sidebar_main')
      </div>
  </div>
  <div  class="content">
        @section('site-content')
        @show
  </div>
</div>
@endsection
