@extends('layout')

@if(Session::has('status'))
    <h3>{{Session::get('status')}}</h3>
@endif

@section('content')
    <tasks></tasks>
@stop


{{--There are many ways and locations to create a template. If you are creating one in a singular instance you can have the template within--}}
{{--the actual blade view instead of in a single file component, etc.--}}
<template id="tasks-template">
    <ul class="list-group">
        <h1>My Tasks</h1>
        <li class="list-group-item" v-for="task in list">
            
            {{--Laravel blade and Vue both use double braces as a syntax identifier--}}
            {{--Make sure to put the @symbol in front of vue references to make blade forget about them--}}
            @{{ task.body  }}
            <strong @click="deleteTask(task)">X</strong>
        </li>
    </ul>
</template>