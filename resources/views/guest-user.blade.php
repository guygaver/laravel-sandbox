@extends('layout')

@if(Session::has('status'))
    <h3>{{Session::get('status')}}</h3>
@endif

@section('content')
    <p>Demonstrating Guest User</p>
    
    {{--@if($signedIn && $user->isAMember())--}}
        {{--<p>Content of logged in user</p>--}}
    {{--@endif--}}

    @if($user->isAMember())
        <p>Content of logged in user</p>
    @endif

@stop