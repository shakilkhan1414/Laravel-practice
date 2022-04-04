<x-home-master>

    @section('main-content')

        <h1 class="my-4">Blog posts</h1>

        <!-- Blog Post -->
        @foreach ($posts as $post)

            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{$post->title}}</h3>
                    <p class="card-text">{{Illuminate\Support\Str::limit($post->body,'150','...')}}</p>
                    <a href="{{route('post',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted {{$post->created_at->diffForHumans()}} by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>

        @endforeach

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
        </ul>

    @endsection

</x-home-master>
