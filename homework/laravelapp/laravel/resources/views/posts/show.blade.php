@extends('layouts.app')

@section('title',$post['title'])

@section('content')
    @if($post['is_new'])
        <div>From if</div>
    @else
        <div>From else</div>
    @endif

    @unless($post['is_new'])
        <div>It is from unless</div>
    @endunless
    <h1>{{$post['title']}}</h1>
    <p>{{$post['content']}}}</p>

    @isset($post['has_comments'])
        <div>From isset</div>
    @endisset

@endsection
