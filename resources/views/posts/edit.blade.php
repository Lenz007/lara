@extends('layouts.admin')

@section('content')

<div class="row">
	

	{{ Form::model($post, ['route' => ['admin.post.update', $post->id], 'method' => 'PUT' ])}}
	<div class="col-md-8">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ["class" => 'form-control']) }}

		{{ Form::label('slug', 'Slug:', ["class" => 'form-spacing-top']) }}
		{{ Form::text('slug', null, ["class" => 'form-control']) }}

		@foreach( $categories as $category)
			
			{{ Form::label('name_cat', $category->name)}}

			{{ Form::checkbox('id_cat', $category->id) }}
			<br>
		@endforeach
		<br>
		
		

		{{ Form::label('content', 'Content:', ["class" => 'form-spacing-top']) }}
		{!! Form::textarea('content', null, ["class" => 'form-control', 'id' => 'editor']) !!}
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Create At:</dt>
				<dd>{{ date('M j, Y H:i', strtotime($post->created_at) ) }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Last Updated:</dt>
				<dd>{{ date('M j, Y H:i', strtotime($post->updated_at) )}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
				</div>
				<div class="col-sm-6">
					{!! Html::linkRoute('admin.post.show', 'Back', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
				</div>
			</div>
		</div>
	</div>	
	{{ Form::close() }}
</div>


@endsection