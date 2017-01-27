<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
class SerachController extends Controller
{
    public function users(){

        $input =  Input::get('q');
        $wyniki = User::where('name', 'like', '%'.$input.'%')->paginate(6); //paginate liczba wyświetlen
        return view('search.users', compact('wyniki'));
    }
}
