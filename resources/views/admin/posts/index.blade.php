@extends('layouts.app')

@section('content')
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Aggiungi post</a>
    <div class="card-deck">
    @foreach ( $posts as $post)
            
        <div class="card">    
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">
                {{$post->description}} - {{$post->user->name}}
            </p>
            </div>
            <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    @endforeach
        
    </div>
@endsection