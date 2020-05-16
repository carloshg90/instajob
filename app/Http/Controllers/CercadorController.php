<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    //Ajax
    public function getTreballadorsAjax()
    {
        $treballadors = User::all()->where('usuari','=','Treballador');
        return response()->json(array('treballadors'=>$treballadors), 200);
    }

    //Ajax
    public function getEmpresesAjax()
    {
        $empreses = User::all()->where('usuari','=','Empresa');
        return response()->json(array('empreses'=>$empreses), 200);
    }
}
