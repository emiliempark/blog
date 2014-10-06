@extends('includes.template')
@section('content')
<h1>Register</h1>
     {{ Form::open(array('url' => 'users')) }}


			{{Form::label('email', 'Email') }}
			{{Form::text('email') }}
			{{$errors->first('email','<p class="error">:message</p>')}}

			{{Form::label('firstname', 'First name') }}
			{{Form::text('firstname') }}
			{{$errors->first('firstname','<p class="error">:message</p>')}}

			{{Form::label('lastname', 'Last name') }}
			{{Form::text('lastname') }}
			{{$errors->first('lastname','<p class="error">:message</p>')}}

			{{Form::label('password', 'Password') }}
			{{Form::password('password') }}
			{{$errors->first('password','<p class="error">:message</p>')}}

			{{Form::label('password_confirmation', 'Confirmed password') }}
			{{Form::password('password_confirmation') }}
			{{$errors->first('password_confirmation','<p class="error">:message</p>')}}

		
			{{Form::reset('Rest') }}
			{{Form::submit('Sign up') }}
		
		{{ Form::close() }}

@stop