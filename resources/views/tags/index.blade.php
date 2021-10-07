@extends('layouts.app')

@auth
    @section("title",__("tags.tags"))
@endauth


@section("content")
@auth
<a href="{{route('tag.create')}}" class="btn btn-primary btn-md " role="button"><i class=" p-1 fas fa-plus"></i>{{__("tags.create_tag")}}</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">{{__("tags.tag")}}</th>
        <th scope="col">{{__("tags.actions")}}</th>
        </tr>
    </thead>
    <tbody>
        
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td > <a href="{{route('tag.show' , $tag)}}"> {{ $tag->tag }} </a> </td>
                    <td>
                        <form method="POST" action="{{route('tag.destroy', $tag)}}">
                            <a class="btn btn-warning col-4" href="{{route('tag.edit', $tag)}}" role="button"><i class="fas fa-pencil-alt p-1"></i>{{__("tags.edit")}}</a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger col-4" role="button"><i class="far fa-trash-alt p-1"></i>{{__("tags.delete")}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        
    </tbody>
</table>
{{$tags->links()}}
@endsection
@endauth
    