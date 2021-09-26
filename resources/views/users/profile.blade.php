@extends('layouts.akram')

@section('content')

@php
    $genderArray = ['Select', 'Male', 'Female'];
    $provinceArray = ['Select', 'Johor', 'Kedah', 'Kelantan', 'Kuala Lumpur', 'Labuan',
                     'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis', 'Pulau Pinang',
                    'Putrajaya', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu'];
@endphp
<div class="container" style="padding-top:3%">

    @if (count($errors)>0)
        @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
         {{$item}}
        </div>
        @endforeach
    @endif

<form method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name="name" class="form-control" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Facebook</label>
    <input type="text" name="facebook" class="form-control" value="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" name="gender">
        @foreach ($genderArray as $item)
        <option value="{{$item}}" {{($user->profile->gender == $item)? 'selected':''}}>{{$item}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Country</label>
    <input class="form-control" type="text" name="country" value="{{$user->profile->country}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Province</label>
    <select class="form-control" name="province">
        @foreach ($provinceArray as $item)
        <option value="{{$item}}" {{($user->profile->province == $item)? 'selected':''}}>{{$item}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" name="password" class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Confirm password</label>
    <input type="password" name="password" class="form-control" >
  </div>
  
  <div class="form-group">
    <button class="btn btn-success" type="submit">update</button>
  </div>
</form>
</div>




@endsection
