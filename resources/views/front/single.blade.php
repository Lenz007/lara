@extends('layouts.blog')

@section('title', "| $post->title")

@section('blog-content')

	
		
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->content !!}</p>
		
	

@endsection