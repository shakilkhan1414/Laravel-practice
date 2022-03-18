@extends('layouts.app')


@section('content')

<h1>About</h1>

<ul>
    @if (count($names))
        @foreach ($names as $name)
            <li>{{$name}}</li>
        @endforeach
    @endif
</ul>


@endsection


