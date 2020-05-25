@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/cercador.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8"  id="padre">
            <h1><b>Busca aquí possibles treballadors.</b></h1>
            <!--Cercador-->
            <input type="text" id="cercador" class="form-control" placeholder="Busca per sector, zona, nom de treballador, horari...">
            <hr>
            <!--Div on generem el DOM-->
            <div class="col-12" id="principal">
            </div>
        </div>
    </div>
</div>

<script>
    //Funcio per rebre les ofertes per ajax
    function obtenirTreballadors() {
       $.ajax({
          type:'GET',
          url:'/obtenirTreballadors',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(resposta) {
            var treballadors = JSON.parse(JSON.stringify(resposta.treballadors));

            //Cridem a la funcio que genera el dom
            mostrarTreballadors(treballadors);
            //Fem una cerca de les paraules introduides en el cercador i filtrem
            const cercador = document.getElementById('cercador');
            cercador.addEventListener('keyup',(e) =>{
                paraulesCercador = e.target.value.toLowerCase();
                const paraulesObtingudes = Object.values(treballadors).filter( treballadors =>{
                    return treballadors.name.toLowerCase().includes(paraulesCercador) ||
                            treballadors.email.toLowerCase().includes(paraulesCercador) ||
                            treballadors.sector.toLowerCase().includes(paraulesCercador) ||
                            treballadors.horari.toLowerCase().includes(paraulesCercador) ||
                            treballadors.zona.toLowerCase().includes(paraulesCercador);
                });
                //Generem el dom però emb el resultat de filtrar
                mostrarTreballadors(paraulesObtingudes);
            });

          }
       });
    }

    //Funcio que genera el DOM
    function mostrarTreballadors(treballadors){

        treballadors = Object.values(treballadors);
        //Borrar principal
        var padre = document.getElementById("padre");
        var hijo = document.getElementById("principal");
        padre.removeChild(hijo);
        //crear principal
        var divPrincipal = document.createElement('div');
        divPrincipal.setAttribute("class","col-12");
        divPrincipal.setAttribute("id","principal");
        padre.appendChild(divPrincipal);

        //Comprovem si hi ha resultats
        if(treballadors.length == 0)
        {
            var principal = document.getElementById("principal");
            var h3 = document.createElement('h3');
            var text = document.createTextNode("No hi ha resultats per aquesta cerca.");
            h3.appendChild(text);
                principal.appendChild(h3);
        }else
        {
            //Generem amb DOM les ofertes
            for (var i = 0, len = treballadors.length; i < len; i++) {
                var principal = document.getElementById("principal");
                var div = document.createElement('div');
                //Generem un div per cada oferta amb el id de la oferta
                div.setAttribute("class",treballadors[i].id);
                principal.appendChild(div);
                //Generar nom del treballador
                var a = document.createElement('a');
                var h3 = document.createElement('h3');
                var linkText = document.createTextNode(treballadors[i].name);
                var idEmpresa = treballadors[i].idEmpresa;
                h3.appendChild(linkText);
                a.setAttribute("href","/perfilAlie/"+treballadors[i].id);
                a.appendChild(h3);
                div.appendChild(a);
                //Informació del treballador
                //Zona
                var h5zona = document.createElement('h5');
                var bzona = document.createElement('b');
                var zonab = document.createTextNode("Zona: ");
                var zonah5 = document.createTextNode(treballadors[i].zona);
                h5zona.appendChild(bzona);
                h5zona.appendChild(zonah5);
                bzona.appendChild(zonab);
                div.appendChild(h5zona);
                //horari
                var h5horari = document.createElement('h5');
                var bhorari = document.createElement('b');
                var horarib = document.createTextNode("Horari: ");
                var horarih5 = document.createTextNode(treballadors[i].horari);
                h5horari.appendChild(bhorari);
                h5horari.appendChild(horarih5);
                bhorari.appendChild(horarib);
                div.appendChild(h5horari);
                //sector
                var h5sector = document.createElement('h5');
                var bsector = document.createElement('b');
                var sectorb = document.createTextNode("Sector: ");
                var sectorh5 = document.createTextNode(treballadors[i].sector);
                h5sector.appendChild(bsector);
                h5sector.appendChild(sectorh5);
                bsector.appendChild(sectorb);
                div.appendChild(h5sector);
                //detalls
                var h5detalls = document.createElement('h5');
                var bdetalls = document.createElement('b');
                var detallsb = document.createTextNode("Correu de contacte: ");
                var detallsh5 = document.createTextNode(treballadors[i].email);
                h5detalls.appendChild(bdetalls);
                h5detalls.appendChild(detallsh5);
                bdetalls.appendChild(detallsb);
                div.appendChild(h5detalls);
                //Boto per contactar amb el treballador
                var btnContactar = document.createElement("a");
                var iContactar = document.createElement("i");
                iContactar.setAttribute("class","fa fa-envelope");
                iContactar.setAttribute("aria-hidden","true");
                btnContactar.setAttribute("class","btn btn-primary "+treballadors[i].id+" ");
                btnContactar.setAttribute("href","formulariContacte/"+treballadors[i].id);
                btnContactar.innerHTML = "Contactar ";
                btnContactar.appendChild(iContactar);
                div.appendChild(btnContactar);
                var hr = document.createElement('hr');
                div.appendChild(hr);
            }
        }
    }
    //Funcio per obtenir els treballadors
    obtenirTreballadors();
 </script>

@endsection
