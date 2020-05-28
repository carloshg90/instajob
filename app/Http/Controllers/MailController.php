<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Mail\EnviarMail;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Oferta;
use App\Email;
use Auth;

class MailController extends Controller
{

    /**
     * Funcions encarregades de contactar amb una empresa en relació a una oferta
     */

    //Funcio que ens retorna la vista del formulari, la empresa i la oferta
    public function index($id)
    {
        $oferta = Oferta::findOrFail($id);
        $empresa = User::findOrFail($oferta->idEmpresa);
        return view('formulariEmail',['empresa'=> $empresa,'oferta'=>$oferta]);
    }

    //Funcio que envia el correu i guarda a la base de dades el correu enviat
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
            'nomReceptor'  =>  'required',
           ]);

        //Obtenim les dades del formulari
         $data = array(
              'nameTreballador'      =>  $request->input('nameTreballador'),
              'message'   =>   $request->input('message'),
              'emailContacte'   =>   $request->input('emailContacte'),
              'zonaOferta'   =>   $request->input('zonaOferta'),
              'horariOferta'   =>   $request->input('horariOferta'),
              'sectorOferta'   =>   $request->input('sectorOferta'),
              'cosOferta'   =>   $request->input('cosOferta'),
              'nomReceptor'   =>   $request->input('nomReceptor'),
          );

        //Gurdem les dades del correu en la BDD
        $email = new Email();
        $email->idRemitent = Auth::user()->id;
        $email->missatgeEnviat =  $request->input('message');
        $email->zonaOferta =  $request->input('zonaOferta');
        $email->horariOferta =  $request->input('horariOferta');
        $email->sectorOferta =  $request->input('sectorOferta');
        $email->cosOferta =  $request->input('cosOferta');
        $email->nomReceptor =  $request->input('nomReceptor');
        $email->save();

        //Enviem el correu
        $email = $request->input('email');
        Mail::to($email)->send(new SendMail($data));
        return back()->with('success', 'S\'ha enviat correctament el teu correu!');

    }

    /**
     * Funcions que ens permeten veure els correus enviats
     */

    //Retornem la vista dels correus que hem enviat
    public function show()
    {
        return view('/correusEnviats');
    }

    //Obtenim els correus de la BDD
    public function rebreCorreus()
    {
        $emails = Email::all()->where('idRemitent','=',Auth::user()->id);
        return response()->json(array('emails'=>$emails), 200);
    }

    //Funcio que ens permet esborrar aquell correu de la BDD
    public function esborrarMissatge($idMissatge)
    {
        $email=Email::where('id','=',$idMissatge);
        $email->delete();
        return true;
    }
    /**
     * Funcions encarregades de contactar amb un altre usuari, sense tenir relacio amb una oferta
     */

     //Ruta del formulari de contacte amb una empresa
    public function index2($idReceptor)
    {
        $receptor = User::findOrFail($idReceptor);
        return view ('formulariContacte',array('receptor'=>$receptor));
    }

    //Funcio que envia el correu i guarda a la base de dades el correu enviat
    public function enviar(Request $request)
    {
        $this->validate($request, [
            'nameTreballador' =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required',
            'emailContacte'  =>  'required|email',
            'nomReceptor'  =>  'required',
           ]);

        //Obtenim les dades del formulari
         $data = array(
              'nameTreballador'      =>  $request->input('nameTreballador'),
              'message'   =>   $request->input('message'),
              'emailContacte'   =>   $request->input('emailContacte'),
              'zonaOferta'   =>   null,
              'horariOferta'   =>   null,
              'sectorOferta'   =>   null,
              'cosOferta'   =>   null,
              'nomReceptor'   =>   $request->input('nomReceptor'),
          );

        //Gurdem les dades del correu en la BDD
        $email = new Email();
        $email->idRemitent = Auth::user()->id;
        $email->missatgeEnviat =  $request->input('message');
        $email->zonaOferta =  null;
        $email->horariOferta =  null;
        $email->sectorOferta =  null;
        $email->cosOferta =  null;
        $email->nomReceptor =  $request->input('nomReceptor');
        $email->save();

        //Enviem el correu
        $email = $request->input('email');
        Mail::to($email)->send(new EnviarMail($data));
        return back()->with('success', 'S\'ha enviat correctament el teu correu!');

    }
    //Retornem la vista dels correus que hem enviat
    public function show2()
    {
        return view('/correusEnviatsEmpresa');
    }

}
