@extends("layouts/app")

@section("title",__("products.product") . " " . $product->product)

@section("content")
  <a class="btn btn-secondary mb-3" href="{{route('product.index')}}" role="button">{{__("products.back")}}</a>
  <div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
          <li class="list-group-item"> {{__("products.id")}}: {{$product->id}} </li>
          <li class="list-group-item"> {{__("products.product")}}: {{$product->product}} </li>
          <li class="list-group-item"> {{__("products.price")}}: {{$product->price}}$</li>
          <li class="list-group-item"> {{__("products.tag")}}: {{$product->tags->pluck("tag")->implode(", ")}}</li>
          <li class="list-group-item"> {{__("products.user_name")}}: {{$userInfo->name}} </li>
          <li class="list-group-item"> {{__("products.user_email")}}: {{$userInfo->email}} </li>
          <li class="list-group-item"> {{__("products.created")}}: {{$product->created_at->format("d/m/y G:i:s")}} </li>
          <li class="list-group-item"> {{__("products.updated")}}: {{$product->updated_at->format("d/m/y G:i:s")}} </li>
    </ul>
      <form method="POST" class=" list-group" action="{{route('product.destroy', $product)}}">
          <a class="btn btn-warning list-item rounded-0" href="{{route('product.edit', $product)}}" role="button"><i class="fas fa-pencil-alt p-1"></i>{{__("products.edit")}}</a>
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger list-item rounded-0" role="button"><i class="far fa-trash-alt p-1"></i>{{__("products.delete")}}</button>
      </form>
  </div>
@endsection