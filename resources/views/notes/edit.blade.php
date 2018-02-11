@extends('layout')

@section('content')

    <h2>Edit Note</h2>
    <form action="/notes/{{$note->id}}" method="post">
        {{method_field('PATCH')}}
        <div class="form-group">
            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$note->body}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" value="add note" class="btn btn-info">Update Note</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

@stop