@extends('layouts.blog')

@section('blog-content')

@foreach($posts as $post)
        <div class="post">
            <h1>{{ Html::linkRoute('front.single', $post->title, [$post->slug] )}}</h1>
            <p>{!! str_limit($post->content, 1000) !!}</p>

            {{ Html::linkRoute('front.single', 'Read more', [$post->slug], ['class' => 'btn btn-primary'] )}}
        </div>
@endforeach    
    <div class="text-center">
        {{ $posts->links() }}
    </div>

@endsection
