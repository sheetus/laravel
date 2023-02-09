
@extends('layouts.app')

@section('title') Create @endsection

@section('content')
    <form action="{{route('posts.update')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{$userPost['title']}}" >
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{$userPost['description']}} </textarea>
        </div>
        <div class="mb-3 ">
            <label class="form-label" for="exampleCheck1">Post Creator</label>
            <select name="user_id" class="form-control">
                <option value="{{$userPost['user_id']}}">{{$userPost->user->name}}</option>
            </select>
        </div>
       <button class="btn btn-success"> Update</button>
    </form>
@endsection