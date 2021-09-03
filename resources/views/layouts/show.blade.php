@extends("layouts/layout")

@section("title","User" . " " . $user->name)

@section("content")
<a class="btn btn-secondary mb-3" href="{{route('users.index')}}" role="button">Back</a>
<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
        <li class="list-group-item"> Id: {{$user->id}} </li>
        <li class="list-group-item"> Name: {{$user->name}} </li>
        <li class="list-group-item"> Email: {{$user->email}} </li>
        <li class="list-group-item"> Created: {{$user->created_at->format("d/m/y G:i:s")}} </li>
        <li class="list-group-item"> Updated: {{$user->updated_at->format("d/m/y G:i:s")}} </li>
  </ul>
    <form method="POST" class=" list-group" action="{{route('users.destroy', $user)}}">
        <a class="btn btn-warning list-group-item rounded-0" href="{{route('users.edit', $user)}}" role="button"><i class="fas fa-pencil-alt p-1"></i>Edit</a>
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger list-group-item rounded-0" role="button"><i class="far fa-trash-alt p-1"></i>Delete</button>
    </form>
</div>
@endsection