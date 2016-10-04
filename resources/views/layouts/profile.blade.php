@extends('layouts.main')

@section('common-content')
<div class="site-wrapper">
  <div class="main-wrapper">
      <div class="conteiner">
        @include('../helpers.sidebar_profile')
      </div>
  </div>
  <div  class="content">
        @section('profile-content')
        @show
  </div>
</div>
@endsection
