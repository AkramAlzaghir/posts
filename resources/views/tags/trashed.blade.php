@extends('layouts.akram')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
    <div class="jumbotron">
    <h1 class="display-4">Trashed posts</h1>
    <a class="btn btn-success" href="{{route('posts')}}">Back</a>
    <a class="btn btn-danger" href="{{route('posts.trashed')}}">Trash <i class="fas fa-trash"></i></a>
    </div>
  </div>
  </div>
  <div class="row">
    @if ($posts->count() > 0)
    <div class="col">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">User</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @php
        $i=0;
      @endphp
      <!-- we send it as posts, as function index in controller -->
      @foreach ($posts as $item) 
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{$item->title}}</td>
      <td>{{$item->user->name}}</td>
      <td>
        <!-- both comments are correct, the second one can be used with the function in post model
        the first comment can be used without using the function in post model-->
          <!-- <img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" -->
          <img src="{{$item->photo}}" alt="{{$item->photo}}"
          class="img-thumbnails" width="100" height="100"> 
      </td>
      <td>
        <!-- we copy font awesome cdn and paste the link inside the layout 
        then we allow it to access the font awesome by going to font awesome page
        then on the top we click on ICON, then in left side we choose free
        then inside it we search on edit, and open the window for edit,
        we copy HTML for edit and we paste it here inside i
        same way we do for delete-->
        <!-- fa 1.5x is to increase the icon/font -->
        <!-- &nbsp; for space between icons -->
        <a class="text-success" href="{{route('post.restore', $item->id)}}"> 
        <i class="fas fa 23 fa-undo"></i></a> &nbsp;&nbsp; 
        <a class="text-danger" href="{{route('post.hdelete', $item->id)}}">
           <i class="fas fa-2x fa-trash-alt"></i> </a>
      </td>
    </tr>
      
    @endforeach
  </tbody>
</table>
    </div>
    @else
    <!-- we put the alert message inside column -->
    <div class="col">
    <div class="alert alert-danger" role="alert">
    Empty trash!
    </div>
    </div>

    @endif
  </div>
</div>

@endsection