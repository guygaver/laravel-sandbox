@extends('layout')

@if(Session::has('status'))
    <h3>{{Session::get('status')}}</h3>
@endif

@section('content')
    <p>The welcome page goes here</p>

    <a href="/phpunit-redirect">Click Me</a>
    
    {{ $user->present()->lowerFullName }}

@stop