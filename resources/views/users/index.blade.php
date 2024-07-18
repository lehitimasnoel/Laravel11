<x-layout>
    @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
    @endif

    <div class="d-flex justify-content-between">

        <a href="{{ route('user.create') }}" class="btn btn-primary">Create new user</a>


        <form action=" {{ route('user.index') }}" method="GET">
            @csrf

            <input name="search" id="search" type="search" value="{{ request('search') }}" placeholder="Search">
            <button  class="btn btn-success">Submit</button>

        </form>
    </div>

      <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <div class="formalign">
                            <a href="" class="btn btn-success">View</a>
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-success">Edit</a>
                            <form  action="{{ route('user.destroy',$user) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->appends(request()->input())->links() }}



</x-layout>
