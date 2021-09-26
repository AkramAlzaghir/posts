@extends('layouts.akram')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    <div class="jumbotron">
  <h1 class="display-4">Create post</h1>
  <a class="btn btn-success" href="{{route('posts')}}">Back</a>
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
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    @foreach ($tags as $item) 
      <input type="checkbox" name="tags[]" value="{{$item->id}}" >
      <label for="">"{{$item->tag}}</label>
    @endforeach
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" name="content" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Photo</label>
    <input type="file" name="photo" class="form-control" >
  </div>
  <div class="form-group">
    <button class="btn btn-primary" type="submit">save</textarea>
  </div>
</form>    </div>
  </div>
</div>
@endsection