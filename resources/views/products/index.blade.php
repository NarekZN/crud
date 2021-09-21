@extends('layouts.app')


{{-- @extends("layouts/layout") --}}
@auth
    @section("title","Products")
@endauth


@section("content")
@auth
<a href="{{route('product.create')}}" class="btn btn-primary btn-md " role="button"><i class=" p-1 fas fa-plus"></i>Create Product</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Tag</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        
            @foreach($products as $product)
            
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td > <a href="{{route('product.show' , $product)}}"> {{ $product->product }} </a> </td>
                    <td> <a href="{{route('product.show' , $product)}}"> {{ $product->price."$" }} </a> </td>
                    <td> <a href="{{route('product.show' , $product)}}"> {{ $product->tags->pluck("tag")->implode(", ")}} </a></td>
                    
                    <td>
                        <form method="POST" action="{{route('product.destroy', $product)}}">
                            <a class="btn btn-warning col-4" href="{{route('product.edit', $product)}}" role="button"><i class="fas fa-pencil-alt p-1"></i>Edit</a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger col-4" role="button"><i class="far fa-trash-alt p-1"></i>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        
    </tbody>
</table>
{{$products->links()}}
@endsection
@endauth
    