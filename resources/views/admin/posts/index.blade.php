@extends('layouts.app')

@section('content')
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary btn-lg active mb-3" role="button" aria-pressed="true">Aggiungi post</a>
    
    <div class="card-deck ">
    @foreach ( $posts as $post)
        
        <div class="card"> 
            <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-success active mb-2"  >Mostra</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" class='w-100' method="post">
                @csrf
                @method('delete')
                <button type='submit' class="btn btn-success active w-100" > Elimina Post </button>

            </form>   
            <div class="card-body">
                <h5 class="card-title">Titolo: {{$post->title}}</h5>
                <p class="card-text">
                    {{$post->description}}
                </p>
                <p class="card-text">
                    Author: {{$post->user->name}}
                </p>
                <p class="card-text">
                    Created: {{$post->created_at}}
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