@extends("layouts/layout")

@section("navbar")
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar scroll</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

@endsection

@section("title","Products")

@section("content")

    <a href="{{route('create')}}" class="btn btn-primary btn-md " role="button"><i class=" p-1 fas fa-plus"></i>Create Product</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td > <a href="{{route('product.show' , $product)}}"> {{ $product->product }} </a> </td>
                        <td> <a href="{{route('product.show' , $product)}}"> {{ $product->price."$" }} </a> </td>
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