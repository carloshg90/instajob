<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\Seguidor;
use App\User;
use Auth;
use DB;

class ofertaController extends Controller
{
    //Funcio per mostrar la vista de crear oferta
    public function show()
    {
        return view('crearOferta');
    }

    //Funcio per crear una oferta
    public function crear(Request $request )
    {
        $oferta = new Oferta();
        $oferta->nomEmpresa =  Auth::user()->name;
        $oferta->idEmpresa =  Auth::user()->id;
        $oferta->sector =  Auth::user()->sector;
        $oferta->horari =  $request['horari'];
        $oferta->zona =  Auth::user()->zona;
        $oferta->cos =  $request['cos'];
        $oferta->save();
        return redirect('/homeEmpresa');
    }

    //Funcio per mostrar les ofertes creades per aquella empresa
    public function mevesOfertes(Request $request )
    {
            $request->USER()->authorizeRoles('Empresa');
            $ofertes=Oferta::all()->where('idEmpresa','=',Auth::user()->id);
            return view('ofertesCreades', array( 'ofertes' => $ofertes));
    }

    //Funcio a la que li passem un id i esborra aquella oferta
    public function borrarOferta($id)
    {
        $oferta = Oferta::findOrFail($id);
        $oferta->delete();
        return redirect('/ofertesCreades');
    }

    //Funcio que li passem un id i retorna la vista amb la informació de una oferta
    public function showEditar($id)
    {
        $oferta=Oferta::findOrFail($id);
        return view('editarOferta',array('oferta' => $oferta));
    }

    //Funcio per editar una oferta segons un id
    public function editarOferta(Request $request, $id)
    {
        $oferta = Oferta::findOrFail($id);
		$oferta->nomEmpresa = Auth::user()->name;
		$oferta->idEmpresa = Auth::user()->id;
		$oferta->sector = Auth::user()->sector;
		$oferta->horari = $request['horari'];
        $oferta->zona = Auth::user()->zona;
        $oferta->cos = $request['cos'];
		$oferta->save();
        return redirect('/ofertesCreades');
    }

    //Funcio que li mostra a l'usuari les ofertes que coincideixen amb el seu sector i zona
    public function mostraOfertesSector(Request $request){

        $request->USER()->authorizeRoles('Treballador');
        $ofertes=Oferta::all()->where('zona','=',Auth::user()->zona)->where('sector','=',Auth::user()->sector);
        return view('/ofertesSectorZona', array( 'ofertes' => $ofertes));
    }

    //Funcio que li mostra a l'usuari les ofertes de les empreses a les que segueix
    public function mostraOfertesSeguits(Request $request){

        $request->USER()->authorizeRoles('Treballador');
        $ofertes1 = User::select('ofertas.*')
        ->leftJoin('seguidors','users.id','=','seguidors.idSeguidor')
        ->leftjoin('ofertas','seguidors.idSeguit','=','ofertas.idEmpresa')
        ->where('users.id','=',Auth::user()->id)->get();
        //select ofertas.cos from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id = 5
        return view('/ofertesSeguits',array( 'ofertes1' => $ofertes1));

    }


}
