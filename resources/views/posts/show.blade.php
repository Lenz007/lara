@extends('layouts.main')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{ $post->title }}</h1>
		<div class="lead">{!! $post->content !!}</div>	
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Url:</label>
				<p>{{ Html::linkRoute('front.single', route('front.single', $post->slug), [$post->slug] ) }}</p>
			</dl>
			<dl class="dl-horizontal">
				
				<label>Create At:</label>
				<p>{{ date('M j, Y H:i', strtotime($post->created_at) ) }}</p>
			</dl>
			<dl class="dl-horizontal">
				<label>Last Updated:</label>
				<p>{{ date('M j, Y H:i', strtotime($post->updated_at) )}}</p>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('admin.post.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route' => ['admin.post.destroy', $post->id], 'method' => 'DELETE']) !!}
					
					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
					{!! Form::close() !!}
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					{!! Html::linkRoute('admin.post.index', 'To all posts', array(), array('class' => 'btn btn-default btn-block')) !!}
				</div>
			</div>
		</div>
	</div>	
</div>


@endsection