@extends('layouts.app')

@section('content')
    <div class='container-lg'>
        
        <p>
            Titolo: {{$post->title}}
        </p>
        <p>
            Descrizione: {{$post->description}}
        </p>
        <p>
            Author: {{$post->user->name}}
        </p>

        @if (isset($post->category_id))
            Categoria: {{$post->category->name}}
        @endif
        
        <div class='py-3'>
            
            <a href="{{route('admin.posts.edit',$post->slug)}}" class="btn btn-primary">Modifica</a>
        </div>
    </div>
@endsection