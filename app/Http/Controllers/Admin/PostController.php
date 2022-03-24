<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::where('user_id', Auth::user()->id)->get();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $tags= Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = $request->validate([
            'title'=>'required|min:5',
            'description'=>'required|min:30',
            'category_id' => 'nullable',
            'tags'=>'nullable|exists:tags,id',
            'img'=>'nullable|image|max:500'
        ]);

        $post = new Post();
        $post->fill($data);

        $slug = Str::slug($post->title);

        $exists = Post::where('slug', $slug)->first();
        $counter=1;

        while ($exists) {
            $newSlug = $slug. '-' .$counter;
            $counter++;

            $exists = Post::where('slug', $newSlug)->first();

            if (!$exists) {
                $slug = $newSlug;
            }
        }

        $post->slug = $slug;
        $post->user_id= Auth::user()->id;

        if (key_exists('img',$data)) {
            $post->img = Storage::put('postCovers', $data['img']);
        }

        $post->save();

        if (key_exists('tags',$data)) {
            
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $categories=Category::all();

        return view('admin.posts.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit',['post'=>$post, 'categories'=>$categories, 'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:30',
            'category_id' => 'nullable',
            'tags'=> 'nullable|exists:tags,id',
            'img'=>'nullable|image|max:500'
        ]);

        $post =Post::findOrFail($id);

        if ($post->title !== $data['title']) {
            $slug = Str::slug($post->title);

            $exists = Post::where('slug', $slug)->first();
            $counter = 1;

            while ($exists) {
                $newSlug = $slug . '-' . $counter;
                $counter++;

                $exists = Post::where('slug', $newSlug)->first();

                if (!$exists) {
                    $slug = $newSlug;
                }
            }

            $post->slug = $slug;
        }

        
        $post->update($data);
    
        if (key_exists('img', $data)) {
            // dd($post->img);
            if ($post->img) {
                Storage::delete( $post->img );
            }
            $post->img = Storage::put('postCovers',$data['img']);

            $post->save();
        }

        if (key_exists('tags',$data)) {
            
            $post->tags()->sync($data['tags']);

        }

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
