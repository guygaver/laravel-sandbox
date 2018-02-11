@extends('layout')

@if(Session::has('status'))
    <h3>{{Session::get('status')}}</h3>
@endif

{{--There are many ways and locations to create a template. If you are creating one in a singular instance you can have the template within--}}
{{--the actual blade view instead of in a single file component, etc.--}}
<div>
    <p>@{{msg | capitalize }}</p>
    <p>@{{'Jimbo' | capitalize }}</p>
</div>

@section('custom_scripts')
    <script src="{{asset('/js/filters.js')}}"></script>
@endsection