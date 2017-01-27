<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function UserAvatar($id, $size){

        //file_get_contents //pobeirz zawartośc ....



        $user = User::find($id);


        if(is_null($user->avatar)){
            $img = Image::make('http://lentech.org/images/no_avatar.png')->fit($size)->response('jpg',90);
        }elseif(strpos($user->avatar, 'http') !== false){
            $img = Image::make($user->avatar)->fit($size)->response('jpg',90);
        }else{
            $img = asset('storage/users/' . $user->id . '/avatars/' . $user->avatar);
            $img = Image::make($img );
            $img->fit($size);
            $img->response('jpg', 90);
        }
        return  $img;
    }
}
