@extends('includes.template')
@section('content')
<h1>User Profile</h1>
  {{$user->firstname}}
  {{$user->email}}

  <a href="{{URL::to('users/'.$user->id.'/edit')}}" class="button">Edit</a>
@stop