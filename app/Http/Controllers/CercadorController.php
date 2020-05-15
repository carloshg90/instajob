<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CercadorController extends Controller
{
    public function showTreballadors()
    {
        return view('cercadorTreballadors');
    }

    public function showEmpreses()
    {
        return view('cercadorEmpreses');
    }
}
