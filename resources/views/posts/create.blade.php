@extends('layouts.master')

@section('content')
<div class="container" style="margin-top: 70px;width: 50%;">
<form action="/posts" method="post">
    {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp" placeholder="Enter title" name="title">
  </div>



  <div class="form-group">
    <label for="exampleFormControldescription">Description</label>
    <textarea class="form-control" id="exampleFormControldescription" rows="3" name="description" placeholder="description" ></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Post Creator</label>
    <select class="form-control" id="exampleFormControlSelect1" name="post-creator">
      <option value="ahmed">Ahmed</option>
      <option value="ali">ali</option>
      <option value="diaa">diaa</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Create</button>
</form>

</div>
@endsection