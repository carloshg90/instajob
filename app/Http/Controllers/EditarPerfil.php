<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EditarPerfil extends Controller
{
    public function show()
    {
        return view('editarPerfil');
    }

    public function editar(Request $request){

        if(Hash::check($request->password, Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
            $user->name =  $request['name'];
            $user->email =  $request['email'];
            $user->password =  Hash::make($request['password']);
            $user->sector =  $request['sector'];
            $user->horari =  $request['horari'];
            $user->usuari =  Auth::user()->usuari;
            $user->zona =  $request['zona'];
            $user->save();

        return redirect('/perfil');
        }
        else{

            return redirect('/editarPerfil');
        }

    }
}
