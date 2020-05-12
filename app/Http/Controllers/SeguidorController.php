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
        //select ofertas.cos from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id = 5
        return response()->json(array('ofertes'=>$ofertes), 200);
    }

    //Funcio que retorna la vista
    public function mostraOfertesSeguits(Request $request){
        return view('/ofertesSeguits');
    }

    //Funció per afegir un registre nou a la taula de seguidors
    protected function seguirZona($id)
    {
        $seguidor = new Seguidor();
        $seguidor->idSeguidor = Auth::user()->id;
        $seguidor->idSeguit = $id;

        $seguidors=Seguidor::where('idSeguidor','=',Auth::user()->id)->where('idSeguit','=',$id)->count();
        if($seguidors == 0){
            $seguidor->save();
            return redirect('/ofertesSectorZona');
        }else{
            return redirect('/ofertesSectorZona');
        }
    }



    //Funcio per deixar de seguir un seguidor
    protected function noSeguirZona($id)
    {
        $seguidor=Seguidor::where('idSeguidor','=',Auth::user()->id)->where('idSeguit','=',$id);
        $seguidor->delete();
        return redirect('/ofertesSectorZona');
    }

    //Funció per afegir un registre nou a la taula de seguidors
    protected function seguirSeguits($id)
    {
        $seguidor = new Seguidor();
        $seguidor->idSeguidor = Auth::user()->id;
        $seguidor->idSeguit = $id;

        $seguidors=Seguidor::where('idSeguidor','=',Auth::user()->id)->where('idSeguit','=',$id)->count();
        if($seguidors == 0){
            $seguidor->save();
            return redirect('/ofertesSeguits');
        }else{
            return redirect('/ofertesSeguits');
        }
    }

    //Funcio per esborrar un seguidor
    protected function noSeguirSeguits($id)
    {
        $seguidor=Seguidor::where('idSeguidor','=',Auth::user()->id)->where('idSeguit','=',$id);
        $seguidor->delete();
        return redirect('/ofertesSeguits');
    }
}
