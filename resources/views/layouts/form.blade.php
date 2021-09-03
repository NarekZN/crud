@extends("layouts/layout")

@section("title", isset($user) ? "Update"." ".$user->name : "Create user")

@section("content")
    <a class="btn btn-secondary mb-3" href="{{route('users.index')}}" role="button">Back</a>
    <form method="POST"
        @if(isset($user))
            action="{{route('users.update', $user)}}" 
        @else
            action="{{route('users.store')}}"
        @endif   
        >
            @csrf

        @isset($user)
            @method("PUT")
        @endisset      
        <div class="col">
            <div class="col-5">
                <input value="{{ old('name', isset($user) ? $user->name :null)}}" name="name" type="text" class="form-control" placeholder="name" aria-label="name">
                @error("name")
                    <div class="alert alert-danger">{{$message}}</div> 
                @enderror
            </div>
           
            <div class="col-5">
                <input value="{{ old('email', isset($user) ? $user->email :null)}}" name="email" type="text" class="form-control mt-2" placeholder="email" aria-label="email">
                @error("email")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{isset($user) ? "Change user" :"Add user"}}</button>
    </form>    
@endsection