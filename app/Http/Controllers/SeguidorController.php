<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seguidor;
use Auth;

class SeguidorController extends Controller
{
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

    //Funcio per esborrar un seguidor
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
