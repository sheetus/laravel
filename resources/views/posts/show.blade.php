@extends('layouts.app')
@section('title') Show @endsection
@section('content')
<div>
    <h2>post Title</h2>
    <p> {{$userPost['title']}}</p>
</div>
   <div>
    <h2>Post description</h2>
    <p><b>{{$userPost['description']}}</b></p>

   </div>
    <div><h2>
        Created_at
    </h2>

<b>>{{$userPost['created_at']}}</b>

</div>
<br>
<div class="row">@foreach($userPost->comments as $comment)
    <div class="comments">
   
  


    <p>{{$comment->user->name}}</p>
    
    <p>{{$comment->body}}</p>
    
</div></div>
@endforeach
<form action="{{route('comments.store',$userPost['id'])}}" method="post">
@csrf
<div class="form-group"><label for="username">Username:</label>
<label for="cars">Choose a car:</label>

<select name="cars" id="cars">
    @foreach ($users as $user)
  <option value="volvo">{{$user->name}}</option>
@endforeach
</select>

</div>
<div class="form-group">
    <label for="body"></label>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Add Comment</button>
</div>



</form>
@endsection





</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
