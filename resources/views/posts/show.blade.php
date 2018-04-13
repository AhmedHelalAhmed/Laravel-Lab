@extends('layouts.master')

@section('content')
<div class="container ">

<div class="card">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
      <p>
<h5 class="card-title">Title :-</h5> {{$post->title}}
      </p>
    
<p>
    <h5 class="card-title">Description :-</h5> {{$post->description}}
</p>
  </div>
</div>



<div class="card">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <p>
    <h5 class="card-title">Name :-</h5> {{$post->user->name}}
    </p>
        <p>
    <h5 class="card-title">Email :-</h5> {{$post->user->name}}
    </p>
        <p>
    <h5 class="card-title">Create At :-</h5> {{$post->created_at}}
    </p>
  </div>
</div>

</div>
@endsection