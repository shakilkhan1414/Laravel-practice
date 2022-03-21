@extends('layouts.app')

@section('content')

    <h1>Edit</h1>
    <br>
    <form action="/posts/{{$post->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Enter Title" value='{{$post->title}}'>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="body" placeholder="Enter Body" value='{{$post->body}}'>
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="form-control btn btn-primary" name="submit">
        </div>
    </form>

    <form action="/posts/{{$post->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">
            <input type="submit" value="Delete" class="form-control btn btn-danger" name="Delete">
        </div>
    </form>

@endsection

