<!-- edit page is similar to create page -->
<!-- edit for show only -->

@extends('layouts.akram')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    </div>
  </div>
  
    <!-- "multipart form data is to allow uploading the file -->
    <!-- update, show, delete, edit, all return id, so the route must has id -->
    <div class="col">
        <div class="card"> 
            <img src="{{$post->photo}}" class="card-img-top" alt="{{$post->photo}}">
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text"> {{$post->content}}</p>
            <p>Created at: {{$post->created_at->diffForHumans()}}</p>
            <p>Updated at: {{$post->updated_at->diffForHumans()}}</p>
            <a class="btn btn-success" href="{{route('posts')}}">Back</a>
            </div>
        </div>
   
    </div>
</div>
@endsection