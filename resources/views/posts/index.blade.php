@extends('layouts.admin')


@section('admin-content')

<div class="row">
	<div class="col-md-10">
		<h1>All Posts</h1>
	</div>
	<div class="col-md-2">
		<a href="{{route('admin.post.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">New post</a>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($posts as $post)

				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>{!! str_limit($post->content, 500) !!}</td>
					<td>{{ date('M j, Y H:i', strtotime($post->created_at) ) }}</td>
					<td>
						<a href="{{route('admin.post.show', $post->id)}}" class="btn btn-default">View</a>
						<a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-default">Edit</a>
					</td>

				</tr>

				@endforeach
			</tbody>
		</table>

		<div class="text-center">
			{!! $posts->links() !!}
		</div>
		
	</div>
</div>

@endsection