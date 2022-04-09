<x-admin-master>

    @section('main-content')

        @if (auth()->user()->userHasRole('Admin'))

            <div class="text-center">
                <h1>Dashboard</h1>
            </div>

        @else

        <h3>Only Admin can access this page!</h3>

        @endif

    @endsection

</x-admin-master>


