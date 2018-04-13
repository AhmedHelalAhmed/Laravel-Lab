@extends('layouts.master')

@section('content')
    <div class="container text-center">
        <h1>ITI Blog All Posts</h1>

        <a class="btn btn-success" href="posts/create">Create Post</a>
        <p></p><p></p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"># Pagination Bouns</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at }}</td>

                    <td>
                        <div class="btn btn-primary">Edit</div>
                        <div class="btn btn-danger">Delete</div>
                        <div class="btn btn-secondary">View</div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection