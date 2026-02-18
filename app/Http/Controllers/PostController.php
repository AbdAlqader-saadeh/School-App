<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public static function index()
    {
        $allposts = Post::get();

        return view('posts.index' , ['posts' => $allposts]);
    }

    public function show(Post $post)
    {
        $this->authorize('viewAny' , $post);

        return view('posts.show' , ['post' => $post]);
    }

    public function create()
    {
        $this->authorize('create' , Post::class);
        $users = User::get();

        return view('posts.create' , ['users' => $users]);
    }

    public function store(Request $request)
    {
        $this->authorize('create' , Post::class);

        // request()->validate([
        //     'title' => ['required','min:3','string'],
        //     'description' => ['required' , 'min:5'],
        //     'post_creator' => ['required' , 'exists:user,id']
        // ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);

        // store the user data in  database
        return to_route('posts.index');
    }

    public function edit($id)
    {
        $post = User::findOrFail($id);

        $users = User::get();

        return view('posts.edit' , ['users' => $users , 'post' => $post]);
    }

    public function update($id)
    {
        $post = Post::find($id);

        $this->authorize('update' , $post);

        request()->validate([
            'title' => ['required','min:3','string'],
            'description' => ['required' , 'min:5'],
            'post_creator' => ['required' , 'exists:users,id']
        ]);

        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;

        $post = Post::find($id);

        $post->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);

        return to_route('posts.show' , $id);
    }

    public function destroy(Request $request , $postId)
    {
        $post = Post::findOrFail($postId);
        $this->authorize('delete' , $post);

        $post->delete();

        //Post::where('title' , $post->title)->delete();
        return to_route('posts.index');
    }
}

