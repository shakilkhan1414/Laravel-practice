@extends('layouts.app')

@section('content')

    <h1>Create</h1>
    <br>

    {!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\PostsController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::text('body', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file', 'Upload image:') !!}
            {!! Form::file('file', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create', ['class'=>'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}

    @if (count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    {{-- <form action="/posts" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="body" placeholder="Enter Body">
        </div>
        <div class="form-group">
            <input type="submit" value="Create" class="form-control btn btn-primary" name="submit">
        </div>
    </form> --}}

@endsection


