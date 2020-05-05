<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Perfil extends Controller
{
    public function show(){
        return view('perfil');
    }
}
