<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;

use Session;

class PostController extends Controller
{

/*    public function __construct()
    {
        $roles = $this->middleware('roles');
    }*/

    public function index() {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //return view('posts.index', ['posts' => $posts]);
        return view('posts.index')->withPosts($posts);
    }

    public function create() {
        $cats = Category::all();
    	return view('posts.create')->withCategories($cats);
    }

    public function store(Request $request) {
    	$this->validate($request, array(
         'title' => 'required|max:255',
         'slug' => 'required|alpha_dash|min:5|max:100',
         'content' => 'required'
         ));

    	$post = new Post;
    	$post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->save();

        //$post = Post::create($request->all());

        $post->categories()->attach(Category::where('id', $post->id_cat)->first());

        Session::flash('success', 'Post is OK');
        //$request->session()->flash('success', 'Post is OK');
        
        //return redirect('/');
        return redirect()->route('admin.post.show', $post->id);
    }

    public function show($id) {
        $post = Post::find($id);
        //return view('posts.show', ['post' => $post]);
        return view('posts.show')->withPost($post);
    }

    public function edit($id) {
        $post = Post::find($id);
        $cats = Category::all();
        return view('posts.edit', ['post' => $post, 'categories' => $cats]);
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);

        if($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title'   => 'required|max:255',
                'content' => 'required'
                ));
        } else {
            $this->validate($request, array(
                'title'   => 'required|max:255',
                'slug'    => 'required|alpha_dash|min:5|max:100|unique:posts,slug',
                'content' => 'required'
                ));
        }
        
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->save();


        $post->categories()->attach(Category::where('id', $post->id_cat)->first());

        Session::flash('success', 'This post was updated');

        return redirect()->route('admin.post.show', $post->id);
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'This post was deleted');

        return redirect()->route('post.index');
    }
}
