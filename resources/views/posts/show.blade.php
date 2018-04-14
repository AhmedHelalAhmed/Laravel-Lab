@extends('layouts.master')

@section('content')
<div class="container "style="margin-top: 40px;width: 80%;" >

<div class="card">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
      <p>
<span class="card-title font-weight-bold">Title :-</span> {{$post->title}}
      </p>
    
<p>
    <p class="card-title font-weight-bold">Description :-</p> {{$post->description}}.
</p>
  </div>
</div>


<br><br>
<div class="card">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <p>
    <span class="card-title font-weight-bold">Name :-</span> {{$post->user->name}}
    </p>
        <p>
    <span class="card-title font-weight-bold">Email :-</span> {{$post->user->email}}
    </p>
        <p>
    <span class="card-title font-weight-bold">Create At :-</span> {{Carbon\Carbon::parse($post->created_at)->format('l jS \\of F Y h:i:s A')}}
    </p>
  </div>
</div>

</div>
@endsection