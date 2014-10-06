@extends('includes.template')
@section('content')
<section class="gallery">
    <h1>{{$topic->name}}</h1> 
    </section>
	
    @foreach($topic->articles as $article)
    <article class="article clear">
        <div class="excerpt img"></div>
        <div class="excerpt text"><h2>{{$article->title}}</h2><p>{{$article->content}}</p>
        	<a href="{{URL::to('articles/'.$article->id )}}" class="excerptLink">read more</a>
        </div>
    </article>
    @endforeach
        
@stop                