<!-- edit page is similar to create page -->
<!-- edit for show only -->

@extends('layouts.akram')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    <div class="jumbotron">
  <h1 class="display-4">Edit tag</h1>
  <a class="btn btn-success" href="{{route('tags')}}">Back</a>
</div>
    </div>
  </div>
  <div class="row">
      @if (count($errors)>0)
      <ul>
          <!-- if have an error, considers them as item  -->
          @foreach ($errors->all() as $item)
            <li>
                <!-- then show me the errors -->
                {{$item}} 
            </li>
            @endforeach
      </ul>
      @endif
    <div class="col">
    <!-- "multipart form data is to allow uploading the file -->
    <!-- update, show, delete, edit, all return id, so the route must has id -->
    <form action="{{route('tag.update', $tag->id)}}" method="POST" >
        @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name="tag" value="{{$tag->tag}}" class="form-control" >
  </div>
 
 
  <div class="form-group">
    <button class="btn btn-primary" type="submit">update</textarea>
  </div>
</form>   
 </div>
  </div>
</div>
@endsection