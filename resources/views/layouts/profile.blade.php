@extends('main')

@section('')
<div class="site-wrapper">
  <div class="main-wrapper">
      <div class="conteiner">
        @include('helper.sidebar_profile')
      </div>
  </div>
  <div  class="content">
        @section()
        @show
  </div>
</div>
@stop
