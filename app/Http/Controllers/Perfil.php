<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Perfil extends Controller
{
    public function show(){
        return view('perfil');
    }

    public function showOther($id){
        $perfil= User::findOrFail($id);
        return view('perfilAlie', array('perfil' => $perfil));
    }
}
