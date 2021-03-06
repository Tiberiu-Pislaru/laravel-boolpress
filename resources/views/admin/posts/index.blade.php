@extends('layouts.app')

@section('content')
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary btn-lg active mb-3" role="button" aria-pressed="true">Aggiungi post</a>
    
    <div class="card-deck flex-wrap">
    @foreach ( $posts as $post)
        
        <div class="card col-4"> 
            <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-success active mb-2"  >Mostra</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" class='w-100' method="post">
                @csrf
                @method('delete')
                <button type='submit' class="btn btn-success active w-100" > Elimina Post </button>

            </form>
        @if ( $post->img)
                
            <img class="card-img-top" src="{{ asset('storage/'.$post->img) }}" alt="Card image cap">   
        @endif
            <div class="card-body">

                <h5 class="card-title">Titolo: {{$post->title}}</h5>
                <p class="card-text">
                    {{$post->description}}
                </p>
                <p class="card-text">
                    Author: {{$post->user->name}}
                </p>
                
                @if ($post->created_at->locale('it')->diffForHumans() !== '12 ore fa' && strlen($post->created_at->locale('it')->diffForHumans()) < strlen('12 ore fa'))
                <p class="card-text">
                    Created: {{$post->created_at->locale('it')->diffForHumans()}}
                </p>
                    
                @else
                <p class="card-text">
                    Created: {{$post->created_at->format('d-m-Y')}}
                </p>
                @endif
                {{-- @if($post->created_at !== $post->updated_at)
                
                <p class="card-text">
                    Updated: {{$post->updated_at->locale('it')->diffForHumans()}}
                </p>
                @endif --}}

                @if (isset($post->category_id))
                    category: {{$post->category->name}}
                @endif

            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated {{$post->updated_at->diffForHumans()}}</small>
            </div>
        </div>
    @endforeach
        
    </div>
@endsection