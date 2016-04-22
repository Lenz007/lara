<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
class FrontController extends Controller
{
	public function getIndex() {
    	$posts = Post::orderBy('created_at', 'asc')->paginate(4);
    	return view('front.index')->withPosts($posts);
    }
    
    public function getSingle($slug) {
    	$post = Post::where('slug', '=', $slug)->first();
    	return view('front.single')->withPost($post);
    }

    public function getContact() {
    	return view('front.contact');
    }
}