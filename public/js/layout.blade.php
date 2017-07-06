@extends('layout')

@section('common-content')
<div class="site-wrapper">
<div class="conteiner">
  @if (!(preg_match('[/news]', URL::current())))
    {{--@include('site.elements.left_sidebar.index')--}}
  @endif
  <div class="clear"></div>
</div>
  @section('site-content')
    @if(isset($message))
      @foreach ($messages->all() as $message)
        <div class="uk-alert uk-alert-danger">{{ $message }}</div>
      @endforeach
    @endif
  @show
  <div class="clear"></div>
</div>
@endsection
