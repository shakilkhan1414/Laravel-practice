@extends('layouts.app')

@section('content')

    <h1>Edit</h1>
    <br>

    {!! Form::model($post,['method'=>'PATCH','action'=>['App\Http\Controllers\PostsController@update',$post->id]]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::text('body', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}



    {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\PostsController@destroy',$post->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete', ['class'=>'btn btn-danger form-control']) !!}
    </div>

    {!! Form::close() !!}

    {{-- <form action="/posts/{{$post->id}}" method="post">
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
    </form> --}}

    {{-- <form action="/posts/{{$post->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">
            <input type="submit" value="Delete" class="form-control btn btn-danger" name="Delete">
        </div>
    </form> --}}

@endsection

