@extends('layout')
@section('common.js')
    <div class="site-wrapper uk-clearfix">
        <div class="conteiner uk-clearfix">
            @if (!(preg_match('[/news]', URL::current())))
                @include('site.elements.left_sidebar.index')
            @endif
        </div>
        @section('site-content')
            @if(isset($message))
                @foreach ($messages->all() as $message)
                    <div class="uk-alert uk-alert-danger">{{ $message }}</div>
                @endforeach
            @endif
        @show
    </div>
@endsection
