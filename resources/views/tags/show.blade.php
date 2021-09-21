@extends("layouts/app")

@section("title","Tag" . " " . $tag->tag)

@section("content")
  <a class="btn btn-secondary mb-3" href="{{route('tag.index')}}" role="button">Back</a>
  <div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
          <li class="list-group-item"> Id: {{$tag->id}} </li>
          <li class="list-group-item"> Tag: {{$tag->tag}} </li>
          <li class="list-group-item"> Created: {{$tag->created_at->format("d/m/y G:i:s")}} </li>
          <li class="list-group-item"> Updated: {{$tag->updated_at->format("d/m/y G:i:s")}} </li>
    </ul>
      <form method="POST" class=" list-group" action="{{route('tag.destroy', $tag)}}">
          <a class="btn btn-warning list-item rounded-0" href="{{route('tag.edit', $tag)}}" role="button"><i class="fas fa-pencil-alt p-1"></i>Edit</a>
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger list-item rounded-0" role="button"><i class="far fa-trash-alt p-1"></i>Delete</button>
      </form>
  </div>
@endsection