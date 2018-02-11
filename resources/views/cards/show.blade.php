@extends('layout')

@section('content')
    <h1>{{$card->title}}</h1>
    <h2>Notes</h2>
    <ul class="list-group">
        @foreach($card->notes as $note)
            <li class="list-group-item">
                <a href="/notes/{{$note->id}}/edit">{{$note->body}}</a>
                <a href="#" class="pull-right">{{$note->user->username}}</a>
            </li>
        @endforeach
    </ul>
    <div>
        <p>Created: {{$card->created_at}}</p>
        <p>Updated: {{$card->updated_at}}</p>
    </div>

    <h3>Add a new note</h3>
    <form action="/cards/{{$card->id}}/notes" method="post">
        <div class="form-group">
            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" value="add note" class="btn btn-info">Add Note</button>
        </div>
        {{--Whenevr you have a form you should provide a csrf_token--}}
        {{ csrf_field() }}
    </form>

    {{--Any errors processed by Laravel on the backend will be accessible in your view via the errors variable.--}}
    {{--In this case the form validation errors are being passed and we can loop through them displaying the message in html--}}
    @if(count($errors))
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@stop
