@extends('includes.template')
@section('content')

    <h1>New Article</h1> 

    {{ Form::open(array('url' => 'articles','files'=>true)) }}

		{{Form::label('topic_id', 'Topic') }}
		{{Form::select('topic_id', $topics) }}
		{{$errors->first('topic_id','<p class="error">:message</p>')}}

		{{Form::label('title', 'Title') }}
		{{Form::text('title') }}
		{{$errors->first('title','<p class="error">:message</p>')}}
		
		{{Form::label('content', 'Content') }}
		{{Form::textarea('content') }}
		{{$errors->first('description','<p class="error">:message</p>')}}

		{{Form::label('photo', 'Photo') }}
		{{Form::file('photo') }}
		{{$errors->first('photo','<p class="error">:message</p>')}}


		{{Form::reset('Cancel') }}
		{{Form::submit('Publish') }}

	{{ Form::close() }}    
@stop                