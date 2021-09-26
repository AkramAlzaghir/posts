<!-- edit page is similar to create page -->
<!-- edit for show only -->

@extends('layouts.akram')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    <div class="jumbotron">
  <h1 class="display-4">Edit Post</h1>
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
    <!-- update, show, delete, edit, all return id, so the route must has id -->
    <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" value="{{$post->title}}" class="form-control" >
  </div>

  <div class="form-group">
    @foreach ($tags as $item) 
      <input type="checkbox" name="tags[]" value="{{$item->id}}" 
      
      @foreach ($post->tag as $item2)
        @if ($item->id==$item2->id)
        checked
        @endif
      @endforeach
      >
      <label for="">"{{$item->tag}}</label>
    @endforeach
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" name="content" rows="3">{{$post->content}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Photo</label>
    <input type="file" name="photo" class="form-control" >
  </div>
  <div class="form-group">
    <button class="btn btn-primary" type="submit">update</textarea>
  </div>
</form>   
 </div>
  </div>
</div>
@endsection