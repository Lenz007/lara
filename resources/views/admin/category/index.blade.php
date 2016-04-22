@extends('layouts.admin')


@section('admin-content')


<div class="row">
	<div class="col-md-12">

		{!! Form::open(array('route' => 'admin.cat.store')) !!}
		{{ Form::label('name', 'Name:')}}
		{{ Form::text('name', null, array('class' => 'form-control') )}}

		{{ Form::label('slug', "Slug:") }}
		{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '100') )}}

		{{ Form::label('parent_id', "Parent id:") }}
		{{ Form::text('parent_id', null, array('class' => 'form-control') ) }}

		{{ Form::submit('Create Cat', array('class' => 'btn btn-success btn-lg btn-block')) }}
		{!! Form::close() !!}
	</div>
</div>

<div class="row">
	<div class="col-md-12">
	<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>slug</th>
				<th>Parent id</th>
				<th>Created At</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($categories as $category)

				<tr>
					<th>{{ $category->id }}</th>
					<td>{{ $category->name }}</td>
					<td>{{ $category->slug }}</td>
					<td>{{ $category->parent_id }}</td>
					<td>{{ date('M j, Y H:i', strtotime($category->created_at) ) }}</td>
					<td>
						<a href="#" class="btn btn-default">Edit</a>
						<a href="#" class="btn btn-default">Delete</a>
					</td>
				</tr>

				@endforeach
			</tbody>
	</table>
	</div>
</div>

@endsection