<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function myPage(){
        return view('fullName', ['content' => '<h1>Ломянский Максим Эдуардович</h1>']);
    }
}
