@extends('layout')

@section('common-content')
  <div class="site-wrapper">
      <div class="conteiner">
            @include('profile.elements.sidebar_profile')
      </div>
      <div  class="content">
            @section('profile-content')
            @show
      </div>
  </div>
@endsection
