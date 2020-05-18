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

    //Funcio que retorna la vista de les ofertes creades per aquella empresa
    public function mevesOfertes(Request $request )
    {
            return view('ofertesCreades');
    }

    //Funcio per mostrar les ofertes Ajax
    public function mevesOfertesAjax(Request $request )
    {
            $request->USER()->authorizeRoles('Empresa');
            $ofertes=Oferta::all()->where('idEmpresa','=',Auth::user()->id);
            return response()->json(array('ofertes'=>$ofertes), 200);
    }

    //Funcio per esborrar oferta Ajax
    public function deleteOferta($id)
    {
        $oferta = Oferta::findOrFail($id);
        $oferta->delete();
        return true;
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

    //Funcio que retorna la vista de les ofertes per sector i zona
    public function mostraOfertesSector(Request $request)
    {
        return view('/ofertesSectorZona');
    }

    //Funcio ajax per mostrar totes les ofertes per sector i zona
    public function mostraOfertesAjax(Request $request){

        //ofertes per sector i zona de les empreses que NO segueixo (LARAVEL ELOQUENT)
        /*$ofertes = DB::table('ofertas')->select('*')->whereNotIn('id',function($query){
            $query->select(DB::raw('(select ofertas.id from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id ='.Auth::user()->id.')'));
            $query->select(DB::raw('ifnull((select ofertas.id from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id ='.Auth::user()->id.'),0)'));
        })
        ->where('ofertas.zona','=',Auth::user()->zona)
        ->where('ofertas.sector','=',Auth::user()->sector)->get();*/

        //SI ESTO RETORNA NULL ES QUE NO SIGO A NADIE, POR LO TANTO DEVOLVEMOS TODAS LAS OFERTAS POR SECTOR I ZONA
        //select ofertas.* from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id =9
        $ofertes = User::select('ofertas.*')
        ->leftJoin('seguidors','users.id','=','seguidors.idSeguidor')
        ->leftjoin('ofertas','seguidors.idSeguit','=','ofertas.idEmpresa')
        ->where('users.id','=',Auth::user()->id)->get();

        if(sizeof($ofertes)>=1)//Segueixo a algú
        {
            $ofertes = DB::table('ofertas')->select('*')->whereNotIn('id',function($query){
                $query->select('ofertas.id')->from('users')
                        ->leftJoin('seguidors','users.id','=','seguidors.idSeguidor')
                        ->leftjoin('ofertas','seguidors.idSeguit','=','ofertas.idEmpresa')
                        ->where('users.id','=',Auth::user()->id);
                    })
            ->where('ofertas.zona','=',Auth::user()->zona)
            ->where('ofertas.sector','=',Auth::user()->sector)->get();

            $fitxer = fopen("C:/basura/basura.log","a+");
            fwrite($fitxer,print_r("HE ENTRADO EN EL ELSE",true)."\n");
            fwrite($fitxer,print_r(sizeof($ofertes),true)."\n");
            fclose($fitxer);
        }
        else//No segueixo a ningú
        {
            $fitxer = fopen("C:/basura/basura.log","a+");
            fwrite($fitxer,print_r("HE ENTRADO EN EL ELSE",true)."\n");
            $ofertes = DB::table('ofertas')->select('*')
            ->where('ofertas.zona','=',Auth::user()->zona)
            ->where('ofertas.sector','=',Auth::user()->sector)->get();
            fwrite($fitxer,print_r(sizeof($ofertes),true)."\n");
            fclose($fitxer);
        }
         /**
         * Obtenim les ofertes de les empreses que no segueixo
         */

		//ofertes per sector i zona de les empreses que NO segueixo (LARAVEL ELOQUENT)
        /*$ofertes = DB::table('ofertas')->select('*')->whereNotIn('id',function($query){
            //$query->select(DB::raw('ifnull((select ofertas.id from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id ='.Auth::user()->id.'),0)'));
        })
        ->where('ofertas.zona','=',Auth::user()->zona)
        ->where('ofertas.sector','=',Auth::user()->sector)->get();*/

        //LOG
        /*$fitxer = fopen("C:/basura/basura.log","a+");
        fwrite($fitxer,print_r(variable o text a escriure,true)."\n");
        fclose($fitxer);*/

        //ofertes per sector i zona de les empreses que NO segueixo (SQL)
        //select * from ofertas where id not in
        //(ifnull((select ofertas.id from users LEFT JOIN seguidors on users.id = seguidors.idSeguidor
        //LEFT JOIN ofertas on seguidors.idSeguit = ofertas.idEmpresa WHERE users.id = 9),0))
        //and ofertas.zona = "Girona" and ofertas.sector = "Hostelería"

        return response()->json(array('ofertes'=>$ofertes), 200);
    }

    //Funcio per esborra el seguiment
    public function esborrarAjax($idEmpresa){
        $seguidor=Seguidor::where('idSeguidor','=',Auth::user()->id)->where('idSeguit','=', $idEmpresa);
        $seguidor->delete();
        return true;
    }

    //Funcio ajax per seguir
    protected function seguirAjax($id)
    {
        $seguidor = new Seguidor();
        $seguidor->idSeguidor = Auth::user()->id;
        $seguidor->idSeguit = $id;
        //Comprovo que aquest seguidor existeix o no
        $seguidors=Seguidor::where('idSeguidor','=',Auth::user()->id)->where('idSeguit','=',$id)->count();

        if($seguidors == 0){
            $seguidor->save();
            return response()->json(['success','Got Simple Ajax Request.']);
        }else{
            return response()->json(['success','Ja segueixes a aquesta empresa.']);
        }
    }

}
