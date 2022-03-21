@extends('layouts.app')

@section('content')

    <h1>Create</h1>
    <br>
    <form action="/posts" method="post">
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
    </form>

@endsection


