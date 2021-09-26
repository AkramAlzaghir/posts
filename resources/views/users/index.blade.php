{{-- @extends('layouts.akram')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
    <div class="jumbotron">
    <h1 class="display-4">All users</h1>
    <a class="btn btn-success" href="{{route('user.create')}}">Create new user</a>
    </div>
  </div>
  </div>
  <div class="row">
    @if ($users->count() > 0)
    <div class="col">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @php
        $i=0;
      @endphp
      <!-- we send it as posts, as function index in controller -->
      @foreach ($users as $item) 
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
     
      <td>
        <!-- we copy font awesome cdn and paste the link inside the layout 
        then we allow it to access the font awesome by going to font awesome page
        then on the top we click on ICON, then in left side we choose free
        then inside it we search on edit, or any icon we need it
        then we open its window, then copy its HTML tag, and we paste it inside i
        same way we do for delete, eye,-->
        <!-- fa 2x is to increase the icon/font -->
        <!-- &nbsp; for space between icons -->
        
        <a class="text-danger" href="{{route('user.destroy', $item->id)}}">
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
    No tag!
    </div>
    </div>

    @endif
  </div>
</div>

@endsection --}}