<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\Seguidor;
use App\User;
use Auth;
use DB;

class SeguidorController extends Controller
{
    //Funcio que li mostra a l'usuari les ofertes de les empreses a les que segueix
    public function mostraOfertesSeguitsAjax(Request $request){

        $request->USER()->authorizeRoles('Treballador');

        $ofertes = User::select('ofertas.*')
        ->leftJoin('seguidors','users.id','=','seguidors.idSeguidor')
        ->leftjoin('ofertas','seguidors.idSeguit','=','ofertas.idEmpresa')
        ->where('users.id','=',Auth::user()->id)->get();

        //ofertes de les empreses que segueixo
        //select ofertas.cos from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id = 5
        //ofertes de les empreses que NO segueixo
        //select * from ofertas where id not in (select ofertas.id from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id = 11)
        //ofertes de les empreses que no segueixo i coincideixen per sector i zona
        //select * from ofertas where id not in (select ofertas.id from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id = 11 and ofertas.zona = "Girona" and ofertas.horari = "Matí" )
        return response()->json(array('ofertes'=>$ofertes), 200);
    }

    //Funcio que retorna la vista
    public function mostraOfertesSeguits(Request $request){
        return view('/ofertesSeguits');
    }

    //Funcio per esborra el seguiment
    public function esborrarAjax($idEmpresa){
        $seguidor=Seguidor::where('idSeguidor','=',Auth::user()->id)->where('idSeguit','=', $idEmpresa);
        $seguidor->delete();
        return true;
    }

}
