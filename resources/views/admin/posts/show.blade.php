@extends('layouts.app')

@section('content')
    <div>
        <p>
            {{$post->title}}
        </p>
        <p>
            {{$post->description}}
        </p>
        <p>
            author: {{$post->user->name}}
        </p>

        @if (isset($post->category_id))
            {{$post->category->name}}
        @endif

        <a href="{{route('admin.posts.edit',$post->slug)}}" class="btn btn-primary">Modifica</a>
    </div>
@endsection