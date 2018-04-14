@extends('layouts.master') @section('content')
<div class="container text-center">
    <h1>ITI Blog All Posts</h1>

    <a class="btn btn-success" href="/posts/create">Create Post</a>
    <p></p>
    <p></p>
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
                <td>{{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</td>
                <td>

                    <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit">Edit</a>


                    <form method="POST" action="/posts/{{ $post->id }}" id="delete" style="display:inline;">
                        {{csrf_field()}}
                        <span class="form-group">
                            {{ method_field('DELETE') }}
                        </span>
                        <span class="form-group">
                            <button type="submit" class="btn btn-danger">Delete</button>

                             <!--
                                 one line can be in place of the javascript
                                  <button onclick="return confirm('are you sure') " type="submit" class="btn btn-danger">Delete</button> -->
                        </span>


                    </form>



                    <a class="btn btn-secondary" href="/posts/{{ $post->id }}">View</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('#delete').submit(function (e) {
        e.preventDefault(); // to stop the form from submitting
        user_input = confirm("Are you sure you want to delete ?");
        if (user_input) {
            this.submit(); // If all the validations succeeded
        }
    });
</script>
@endsection