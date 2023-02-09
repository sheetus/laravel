
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
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td value="{{$post->user->name}}">{{$post->user->name}}</td>
            <td>{{$post['created_at']}}</td>
           
            <td>
                <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                
                <a href="{{route('posts.delete',$post['id'])}}" class="btn btn-danger delete " data-confirm="Are you sure to delete this item?" data-toggle="modal" data-target="#exampleModalCenter">Delete</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
  Launch demo modal
   </button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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


