@extends('includes.template')
@section('content')
<h1>login</h1>
     {{ Form::open(array('url' => 'login')) }}

			{{Form::label('email', 'Email') }}
			{{Form::text('email') }}

			{{Form::label('password', 'Password') }}
			{{Form::password('password') }}

			{{Form::submit('Login') }}
		
		{{ Form::close() }}

		{{Session::get('error')}}

@stop