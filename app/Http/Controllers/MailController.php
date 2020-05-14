<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //Funcio que ens retorna la vosta del formulari
    public function index()
    {
        return view('formulariEmail');
    }

    //Funcio que envia el correu
    public function send(Request $request)
    {
        //Validem
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
           ]);

        //Obtenim les dades
         $data = array(
              'name'      =>  $request->input('name'),
              'message'   =>   $request->input('message')
          );


        $email = $request->input('email');

        Mail::to($email)->send(new SendMail($data));

        return back()->with('success', 'Enviado exitosamente!');

    }
}
