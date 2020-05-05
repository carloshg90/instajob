<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class CanviarContrassenyaController extends Controller
{
    public function show()
    {
        return view('canviarContrassenya');
    }

    public function editar(Request $request){

        if(Hash::check($request->password, Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
            $user->name =  Auth::user()->name;
            $user->email =  Auth::user()->email;
            $user->password =  Hash::make($request['newPassword']);
            $user->sector =  Auth::user()->sector;
            $user->horari =  Auth::user()->horari;
            $user->usuari =  Auth::user()->usuari;
            $user->zona =  Auth::user()->zona;
            $user->save();

        return redirect('/home');
        }
        else{

            return redirect('/editarPerfil');
        }

    }
}
