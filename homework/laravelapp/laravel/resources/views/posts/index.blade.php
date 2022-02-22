@extends('layouts.app')

@section('title','Blog')

@section('content')
{{--    @each('posts.partials.post',$posts, 'post')--}}
        @forelse($posts as $key => $post)
{{--            @break($key = 2)--}}
{{--            @continue($key == 1)--}}
        @include("posts.partials.post",[])
        @empty
            <div>No post here</div>
        @endforelse

@endsection
