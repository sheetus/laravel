@extends('layouts.app')
@section('title') Show @endsection
@section('content')
    we will study {{$userPost['Title']}}
    instructor is {{$userPost['Posted_by']}}
@endsection



