@extends('layouts.app')

@section('content')
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary btn-lg active mx-3 mb-3" role="button" aria-pressed="true">Aggiungi post</a>
    
    <div class="card-deck col-lg-12">
    @foreach ( $posts as $post)
        
        <div class="card"> 
            <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-success active" role="button" aria-pressed="true">Mostra</a>   
            <div class="card-body">
                <h5 class="card-title">Titolo: {{$post->title}}</h5>
                <p class="card-text">
                    {{$post->description}}
                </p>
                <p class="card-text">
                    Author: {{$post->user->name}}
                </p>

                @if (isset($post->category_id))
                    category: {{$post->category->name}}
                @endif

            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    @endforeach
        
    </div>
@endsection