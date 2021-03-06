<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('post_permission', ['except'=>['show', 'store']]);
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
            'post_content' => 'required|min:5',
        ], [
            'required' => 'Pole jest wymagane',
            'min'=> 'Pole musi mieć :min znaków'
        ]);

        Post::create([
            'user_id'=>Auth::id(),
            'content'=>$request->post_content,
        ]); //pOTRZEBUJESZ PROCETED FILABLE

                //LUB
        //
        //        $post = new Post();
        //        $post->content = $request->post_conetn
        //            $post->save()\
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));

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
            'post_content' => 'required|min:5',
        ], [
            'required' => 'Pole jest wymagane',
            'min'=> 'Pole musi mieć :min znaków'
        ]);
        Post::find($id)->update(['content' => $request->post_content]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where([
            'id' => $id
        ])->delete();
        return back();
    }
}
