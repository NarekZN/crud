@extends("layouts/layout")

@section("title","Product" . " " . $product->product)

@section("content")
  <a class="btn btn-secondary mb-3" href="{{route('index')}}" role="button">Back</a>
  <div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
          <li class="list-group-item"> Id: {{$product->id}} </li>
          <li class="list-group-item"> Name: {{$product->product}} </li>
          <li class="list-group-item"> Email: {{$product->price}} </li>
          <li class="list-group-item"> Created: {{$product->created_at->format("d/m/y G:i:s")}} </li>
          <li class="list-group-item"> Updated: {{$product->updated_at->format("d/m/y G:i:s")}} </li>
    </ul>
      <form method="POST" class=" list-group" action="{{route('product.destroy', $product)}}">
          <a class="btn btn-warning list-group-item rounded-0" href="{{route('product.edit', $product)}}" role="button"><i class="fas fa-pencil-alt p-1"></i>Edit</a>
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger list-group-item rounded-0" role="button"><i class="far fa-trash-alt p-1"></i>Delete</button>
      </form>
  </div>
@endsection