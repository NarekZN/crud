@extends("layouts/app")

@section("title", isset($product) ? __("products.update")." ".$product->product : __("products.create_product"))

@section("content")
    <a class="btn btn-secondary mb-3" href="{{route('product.index')}}" role="button">{{__("products.back")}}</a>
    <form method="POST"
        @if(isset($product))
            action="{{route('product.update', $product)}}" 
        @else
            action="{{route('product.store')}}"
        @endif   
        >
            @csrf

        @isset($product)
            @method("PUT")
        @endisset      
        <div class="col">

            <div class="col-5">
                <input value="{{ old('product', isset($product) ? $product->product :null)}}" name="product" type="text" class="form-control" placeholder={{__("products.product")}} aria-label="product">
                @error("product")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
           
            <div class="col-5">
                <input value="{{ old('price', isset($product) ? $product->price :null)}}" name="price" type="number" class="form-control mt-2" placeholder={{__("products.price")}} aria-label="price">
                @error("price")
                    <div class="alert alert-danger">{{$message}}</div>
                 @enderror
            </div>

           
            <div class="col-5">
                <label class="mt-3" for="exampleFormControlSelect2">{{__("products.tag")}}</label>
                
                <select multiple class="form-control" name="tags[]" type="text" value=""> 
                    @foreach ($tag as $item)
                        <option value="{{$item->id}}">{{$item->tag}}</option>
                    @endforeach    
                </select>  
                
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{isset($product) ? __("products.change_product") :__("products.add_product")}}</button>
    </form>    
    
@endsection
