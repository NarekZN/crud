@extends('layouts.app')


@section("content")
    <form method="POST" action="{{route('weather.store')}}">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder={{__("weather.country")}} aria-label="Country" name="Country">
            <div class="input-group-append">
            <button class="btn btn-outline-success" type="submit">{{__("weather.search")}}</button>
            </div>
        </div>
    </form>
    
    @isset($weather)
        {{$weather}}
    @endisset      
   
    
@endsection