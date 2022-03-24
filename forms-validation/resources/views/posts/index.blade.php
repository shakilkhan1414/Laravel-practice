@extends('layouts.app')

@section('content')

<div class="extra">
    @foreach ($posts as $post)
            <div class="card" style="width: 20rem;">
                <img src="{{$post->path}}" alt="post-image" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->body}}</p>
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Read more</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success">Edit</a>
                </div>
            </div>
    @endforeach
</div>

<style>
    .extra{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .card{
        border: 1px solid rgb(226, 226, 226);
        margin: 10px;
        padding: 10px;
    }

</style>

@endsection

