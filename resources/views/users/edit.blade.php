<x-layout>

    <form action="{{ route('user.update',$user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old( 'name' , $user->name) }}">
            @error('name')
                <span class = "text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Email address</label>
            <input  name="email" class="form-control"  placeholder="name@example.com" value="{{ old( 'email' , $user->email) }}">
            @error('email')
                <span class = "text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
           <button  class="btn btn-primary">Submit</button>
           <a href="{{ route('user.index') }}" class="btn btn-danger">Cancel</a>
        </div>

    </form>



</x-layout>
