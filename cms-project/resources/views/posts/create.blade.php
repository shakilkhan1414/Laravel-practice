<x-admin-master>

    @section('main-content')

        <h2 class="text-center">Create Post</h2>

        @if (count($errors)>0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" class="form-control" rows="5" placeholder="Enter Body"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary">Create Post</button>
            </div>

        </form>

    @endsection

</x-admin-master>
