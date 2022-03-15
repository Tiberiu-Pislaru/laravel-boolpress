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

        <a href="{{route('admin.posts.edit',$post->slug)}}" class="btn btn-primary">Modifica</a>
    </div>
@endsection