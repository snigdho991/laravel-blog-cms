<?php

namespace App\Http\Controllers;

use Session;
use Auth;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();

        if($categories->count() == 0){
            Session::flash('warning', 'Category not found ! Insert a new category to create a post.');
            return redirect()->route('category.create');
        } else if($tags->count() == 0){
            Session::flash('warning', 'Tags not found ! Insert a new tag to create a post.');
            return redirect()->route('tag.create');
        }

        return view('admin.posts.create')->with('categories', $categories)                             ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title'       => 'required|max:500',
            'featured'    => 'required|image',
            'category_id' => 'required',
            'content'     => 'required', 
            'tags'        => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'featured'    => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug'        => str_slug($request->title),
            'user_id'     => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully !');
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all()); 
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
        $this->validate($request, [
            'title'       => 'required|max:500',
            'content'     => 'required',
            'category_id' => 'required',
            'tags'        => 'required'
        ]);

        $post = Post::find($id);
        $post = Post::withTrashed()->where('id', $id)->first();

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalname();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title       = $request->title;
        $post->content     = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('info', 'Post updated successfully !');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('warning', 'Post trashed successfully !');
        return redirect()->route('post.trashed');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function editTrashed($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        return view('admin.posts.edittrashed')->with('post', $post)
                                              ->with('categories', Category::all())
                                              ->with('tags', Tag::all()); 
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();

        Session::flash('error', 'Post deletd successfully !');
        return redirect()->back();
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();

        Session::flash('success', 'Post restored successfully !');
        return redirect()->route('posts');
    }
}
