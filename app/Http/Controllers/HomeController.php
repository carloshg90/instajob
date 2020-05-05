<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Retornem una vista o una altra dependent del rol de cada usuari
        if(Auth::user()->hasRole('treballador')){
            return view('homeTreballador');
        }
        else
            return view('homeEmpresa');

    }
}
