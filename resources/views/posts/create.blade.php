@extends('layouts.admin')


@section('admin-content')

		{!! Form::open(array('route' => 'admin.post.store')) !!}
		{{ Form::label('title', 'Title:')}}
		{{ Form::text('title', null, array('class' => 'form-control') )}}

		{{ Form::label('slug', "Slug:") }}
		{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '100') )}}

		@foreach( $categories as $category)
			{{ Form::label('name_cat', $category->name)}}
			{{ Form::checkbox('id_cat', $category->id) }}
			<br>
		@endforeach
		<br>


		{{ Form::label('content', "Post Body:") }}
		{{ Form::textarea('content', null, array('class' => 'form-control', 'id' => 'editor') ) }}

		{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
		{!! Form::close() !!}

@endsection