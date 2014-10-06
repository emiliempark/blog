@extends('includes.template')
@section('content')

    <article>
    <h1>{{$article->title}}</h1> 

        <div class="article img"></div>
        <div class="article text">{{$article->content}}</div>

    </article>
        
@stop                