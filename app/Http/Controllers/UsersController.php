<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class UsersController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission', ['except'=>['show']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->get();
        //$posts = Post::where('user_id', $id)->get();
        return view('users.show', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = Auth::user();
        return view('users.edit', compact('user'));
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
            'name' => 'required|min:3',
            'email' => [
               'required',
               'email',
                Rule::unique('users')->ignore($id),
            ],],
           [
                'required' => 'Pole jest wymagane',
               'email' => 'Pole jest wymagane',
               'unique'=> "Inny użytkownik ma już taki adres e-mail",
               'min'=> 'Pole musi mieć :min znaków'
       ]);



        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;

        if($request->file('avatar')){
            $upload_path = 'public/users/' . $id . '/avatars';
            $filename = str_replace($upload_path . '/', '', $request->file('avatar')->store($upload_path));
            $user->avatar = $filename;
        }

        $user->save();
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
        //
    }
}
