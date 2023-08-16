<?php

namespace App\Http\Controllers;
use App\Models\BlogPost;
use App\Models\comments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $comments=comments::create([
            'content'=>$request->content,
            'post_id'=> $request->post_id,
            'user_id'=> Auth::User()->id
        ]);
        return redirect()->back()->with('message','comment added successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
