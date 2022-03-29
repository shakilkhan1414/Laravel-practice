<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Header</h1>
        @yield('main-content')

        <ul class="list-unstyled">
            @foreach ($users as $user)
                <li>{{$user->name}}</li>
            @endforeach
        </ul>

        <h3>Footer</h3>
    </div>
</body>
</html>
