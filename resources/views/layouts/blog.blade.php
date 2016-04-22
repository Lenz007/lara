@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-8">
        @yield('blog-content')
    </div>
    <div class="col-md-4">
        <h1>Sidebar</h1>
    </div>
</div>


@endsection
