<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        // dd('sda');
        return view('blog.home');
    }
    public function redirect()
    {
        if(Auth::user())
        {
            return redirect()->route('index');
        }
        else
        return redirect()->route('/');
    }
    public function index()
    {
        $posts= BlogPost::with('User')->paginate(5);
        return view('blog.index',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('xxxxxxxxxxxxxxxxx');
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPost = BlogPost::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>1
        ]);
        return redirect('blog/'.$newPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return view('blog.show',['post'=>$blogPost]); // return fetched posts
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit',['post'=>$blogPost]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title'=> $request->title,
            'body'=> $request->body
        ]);

        return redirect('blog/'.$blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect('/blog');
    }
}
