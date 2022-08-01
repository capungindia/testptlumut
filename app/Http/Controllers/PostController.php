<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
    	$posts = Post::orderBy('date', 'desc')->get();

    	return view('post.index')
    		->with('posts', $posts);
    }

    public function data(){
    	$posts = Post::orderBy('date', 'desc')->get();

    	return json_encode([
    			'response'	=> 'success',
    			'data'		=> $posts,
    		]);
    }

    public function create(){
    	return view('post.create');
    }

    public function save(Request $req){
    	$feedback = [
            'status'    => 'success',
        ];

    	$post = new Post();
        $post->title 			= $req->title;
        $post->content 			= $req->content;
        $post->date 			= now();
        $post->username 		= auth()->user()->username;

        $post->save();

        $feedback['postid'] = $post->idpost;

        Session::flash('feedback', $feedback);
            
        return redirect()
        	->route('post.index');
    }

    public function change(Request $req){
    	$post = Post::find($req->idpost);

    	return view('post.update')
    		->with('post', $post);
    }

    public function update(Request $req){
    	$feedback = [
            'status'    => 'success',
        ];

    	$post = Post::find($req->idpost);
        $post->title 			= $req->title;
        $post->content 			= $req->content;
        $post->date 			= now();
        $post->username 		= auth()->user()->username;

        $post->save();

        $feedback['postid'] = $post->idpost;

        Session::flash('feedback', $feedback);
            
        return redirect()
        	->route('post.index');
    }

    public function delete(Request $req){
    	$feedback = [
            'status'    => 'success',
        ];

    	$post = Post::find($req->idpost);
        $post->delete();

        Session::flash('feedback', $feedback);
            
        return redirect()
        	->route('post.index');
    }
}
