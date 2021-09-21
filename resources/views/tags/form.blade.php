@extends("layouts/app")

@section("title", isset($tag) ? "Update"." ".$tag->tag : "Create tag")

@section("content")
    <a class="btn btn-secondary mb-3" href="{{route('tag.index')}}" role="button">Back</a>
    <form method="POST"
        @if(isset($tag))
            action="{{route('tag.update', $tag)}}" 
        @else
            action="{{route('tag.store')}}"
        @endif   
        >
            @csrf

        @isset($tag)
            @method("PUT")
        @endisset      
        <div class="col">
            <div class="col-5">
                <input value="{{ old('tag', isset($tag) ? $tag->tag :null)}}" name="tag" type="text" class="form-control" placeholder="tag" aria-label="tag">
                @error("tag")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{isset($tag) ? "Change tag" :"Add tag"}}</button>
    </form>  
    
@endsection

