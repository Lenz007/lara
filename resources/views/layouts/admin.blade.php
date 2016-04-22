@extends('layouts.main')

@section('content')

<div class="row">

	<div class="col-md-2">
        <h1>Posts</h1>
        <ul>
        	<li><a href="{{ route('admin.post.index') }}">All posts</a></li>
        	<li><a href="{{ route('admin.post.create') }}">Create post</a></li>
        </ul>

        <h1>Categories</h1>
        <ul>
        	<li><a href="{{ route('admin.cat.index') }}">All cats</a></li>
        	
        </ul>

        
        
    </div>
    <div class="col-md-10">
        @yield('admin-content')
    </div>
</div>


@endsection
