@extends('layouts.master')

@section('content')
<!-- for show error  -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- for show error  -->
<div class="container" style="margin-top: 70px;width: 50%;">
<!-- form do not understnad post or get only  -->
<!-- we add method field to make the laravel  -->
<!-- understand that the request is put -->
<form action="/posts/{{$post->id}}" method="post">

    {{csrf_field()}}
  <div class="form-group">
    @method('PUT')   
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp" placeholder="Enter title" name="title" value="{{$post->title}}" >
  </div>



  <div class="form-group">
    <label for="exampleFormControldescription">Description</label>
    <textarea class="form-control" id="exampleFormControldescription" rows="3" name="description" placeholder="description">{{$post->description}}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Post Creator</label>
    <select class="form-control" id="exampleFormControlSelect1" name="user_id" value="{{$post->user_id}}">
      
      @foreach ($users as $user)
      <option value="{{$user->id}}" {{ $post->user_id==$user->id? 'selected':'' }} >{{$user->name}}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-success">Update</button>
</form>

</div>
@endsection