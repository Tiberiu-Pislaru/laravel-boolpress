@extends('layouts.app')

@section('content')
    <div >
        
        <p>
            Titolo: {{$post->title}}
        </p>
        <p>
            Descrizione: {{$post->description}}
        </p>
        <p>
            Author: {{$post->user->name}}
        </p>

        <div>

            @if (isset($post->category_id))
                Categoria: {{$post->category->name}}
            @endif
        </div>
        
        {{-- @dd($post->tags()) --}}
        <div>
            Tags:
            @if($post->tags !== null)
                @foreach($post->tags as $tag)
                    {{$tag->name}}
                @endforeach
            @endif
        </div>
        
        <div class='py-3'>
            
            <a href="{{route('admin.posts.edit',$post->slug)}}" class="btn btn-primary">Modifica</a>
        </div>
    </div>
@endsection