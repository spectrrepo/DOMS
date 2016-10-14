@extends('layouts.profile')
@section('profile-content')
  <h3>Избранное</h3>
  <div class="">
    @foreach ($images as $image)
       <img src="{{ $image->photo->url('small') }}" alt="" /> 
    @endforeach
  </div>
@endsection
