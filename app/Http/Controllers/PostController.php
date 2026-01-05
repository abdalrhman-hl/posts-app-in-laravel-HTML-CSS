<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()

    {
        $postsFromDB = Post::all();


        return view('posts.index', ['posts' => $postsFromDB]);
    }
    public function show(Post $posts)
    {
        // $singlePostFromDB = Post::findOrFail($postID);
        // if (is_null($singlePostFromDB))
        // {
        //     return to_route('posts.index');
        // }
        // $singlePostFromDB = Post::where('id',$postID)->get();
        // $singlePost = ['id' => 1, 'title' => 'php', 'description' => 'this is description', 'posted_by' => 'Ahmed', 'created_at' => '2025/5/30'];
        return view('posts.show', ['post' => $posts]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',['users'=>$users]);
    }

    public function store()
    {
        // $request = request();
        // dd($request);
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postcreator = request()->Post_creator;


        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;

        // $post->save();
        
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id'=> $postcreator,
        ]);

        //dd($data ,$title ,$description ,$postcreator);
        return to_route('posts.index');

        //1- get the user data
        //2-store the user data in data base
        //3-redirection to posts.index
    }

    public function edit(Post $posts)
    {

        $users = User::all();
        return view('posts.edit',['users'=>$users , 'post'=>$posts]);
    }
    public function update($postId)
    {
        // $request = request();
        // dd($request);
        $singlePostFromDB = Post::findOrFail($postId);

        $title = request()->title;
        $description = request()->description;
        $postcreator = request()->Post_creator;

        $singlePostFromDB->update([
            'title'=>$title,
            'description'=>$description,
        ]);

        //dd($title ,$description ,$postcreator);
        return to_route('posts.show', $postId);

        //1- get the user data
        //2-UPDATE the user data in data base
        //3-redirection to posts.show
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        //1-delete the post from database
        //2-redirect to posts.index
        return to_route('posts.index');
    }
} 
