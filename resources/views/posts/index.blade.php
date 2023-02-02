
@extends('layouts.app')

@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userPosts as $post)
        <tr>
            <td>{{$post['Id']}}</td>
            <td>{{$post['Title']}}</td>
            <td>{{$post['Posted_by']}}</td>
            <td>{{$post['Created_at']}}</td>
            <td>
                <a href="{{route('posts.show',$post['Id'])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.update')}}" class="btn btn-primary">Edit</a>
                
                <a href="{{route('posts.destroy'),$post['Id']}}" class="btn btn-danger delete " data-confirm="Are you sure to delete this item?">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <script>
    var deleteLinks = document.querySelectorAll('.delete');
for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();
        var choice = confirm(this.getAttribute('data-confirm'));
        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
 </script>
@endsection


