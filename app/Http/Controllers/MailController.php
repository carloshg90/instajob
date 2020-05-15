<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Oferta;
use App\Email;
use Auth;

class MailController extends Controller
{
    //Funcio que ens retorna la vista del formulari, la empresa i la oferta
    public function index($id)
    {
        $oferta = Oferta::findOrFail($id);
        $idempresa = Oferta::select('idempresa')->where('id','=',$id);
        $empresa = User::findOrFail($id);
        return view('formulariEmail',['empresa'=> $empresa,'oferta'=>$oferta]);
    }

    //Funcio que envia el correu i guarda a la base de dades en email enviat
    public function send(Request $request)
    {

        $this->validate($request, [
            'nameTreballador' =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required',
            'emailContacte'  =>  'required|email',
            'zonaOferta'  =>  'required',
            'horariOferta'  =>  'required',
            'sectorOferta'  =>  'required',
            'cosOferta'  =>  'required',
            'nameEmpresa'  =>  'required',
           ]);

        //Obtenim les dades
         $data = array(
              'nameTreballador'      =>  $request->input('nameTreballador'),
              'message'   =>   $request->input('message'),
              'emailContacte'   =>   $request->input('emailContacte'),
              'zonaOferta'   =>   $request->input('zonaOferta'),
              'horariOferta'   =>   $request->input('horariOferta'),
              'sectorOferta'   =>   $request->input('sectorOferta'),
              'cosOferta'   =>   $request->input('cosOferta'),
              'nameEmpresa'   =>   $request->input('nameEmpresa'),
          );

        $email = new Email();
        $email->idRemitent = Auth::user()->id;
        $email->missatgeEnviat =  $request->input('message');
        $email->zonaOferta =  $request->input('zonaOferta');
        $email->horariOferta =  $request->input('horariOferta');
        $email->sectorOferta =  $request->input('sectorOferta');
        $email->cosOferta =  $request->input('cosOferta');
        $email->nameEmpresa =  $request->input('nameEmpresa');
        $email->save();

        $email = $request->input('email');
        Mail::to($email)->send(new SendMail($data));
        return back()->with('success', 'Enviado exitosamente!');

    }


    public function show()
    {
        return view('/correusEnviats');
    }

    //Ajax
    public function rebreCorreus()
    {
        $emails = Email::all()->where('idRemitent','=',Auth::user()->id);
        return response()->json(array('emails'=>$emails), 200);
    }

    public function esborrarMissatge($idMissatge)
    {
        $email=Email::where('id','=',$idMissatge);
        $email->delete();
        return true;
    }
}
