

@extends('includes.template')
@section('content')
	<h2>Edit User Details</h2>
		
	{{ Form::model($user, array('url' => 'users/'.$user->id,'method'=>'put')) }}

			{{Form::label('email', 'Email') }}
			{{Form::text('email') }}
			{{$errors->first('email','<p class="error">:message</p>')}}
		
			{{Form::label('firstname', 'First name') }}
			{{Form::text('firstname') }}
			{{$errors->first('firstname','<p class="error">:message</p>')}}

			{{Form::label('lastname', 'Last name') }}
			{{Form::text('lastname') }}
			{{$errors->first('lastname','<p class="error">:message</p>')}}

		
			{{Form::submit('Update') }}
			
		
		{{ Form::close() }}
@stop			