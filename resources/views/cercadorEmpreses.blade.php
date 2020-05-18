@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/cercador.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8" id="padre">
            <h1><b>Busca aquí empreses.</b></h1>
            <!--Cercador-->
            <input id="cercador" type="text" class="form-control" placeholder="Busca per sector, zona, nom d'empresa, horari...">
            <hr id="hr">
            <!--Div on generem el DOM-->
            <div class="col-12" id="principal">

            </div>
        </div>
        <!--Botons-->
        <div class="col-2">
            <div class="col-12">
                <a href="http://localhost:8000/ofertesSectorZona" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Ofertes per sector i zona.
                </a>
            </div>
            <div class="col-12">
                <a href="http://localhost:8000/ofertesSeguits" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Ofertes de les mepreses que segueixo.
                </a>
            </div>
            <div class="col-12">
                <a href="http://localhost:8000/correusEnviats" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Veure els meus correus enviats.
                </a>
            </div>
            <div class="col-12">
                <a href="http://localhost:8000/buscarEmpreses" class="btn btn-outline-dark" style="margin-bottom: 1em">
                    Buscar empreses.
                </a>
            </div>
        </div>
    </div>
</div>

<script>
     //Funcio per rebre les ofertes per ajax
     function obtenirEmpreses() {
       $.ajax({
          type:'GET',
          url:'/obtenirEmpreses',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(resposta) {
            var empreses = JSON.parse(JSON.stringify(resposta.empreses));

            //Cridem a la funcio que genera el dom
            mostrarEmpreses(empreses);
            //Fem una cerca de les paraules introduides en el cercador i filtrem
            const cercador = document.getElementById('cercador');
            cercador.addEventListener('keyup',(e) =>{
                paraulesCercador = e.target.value.toLowerCase();
                const paraulesObtingudes = Object.values(empreses).filter( empreses =>{
                    return empreses.name.toLowerCase().includes(paraulesCercador) ||
                            empreses.email.toLowerCase().includes(paraulesCercador) ||
                            empreses.sector.toLowerCase().includes(paraulesCercador) ||
                            empreses.horari.toLowerCase().includes(paraulesCercador) ||
                            empreses.zona.toLowerCase().includes(paraulesCercador);
                });
                //Generem el dom però emb el resultat de filtrar
                mostrarEmpreses(paraulesObtingudes);
            });
          }
       });
    };

    //Funcio que genera el DOM
    function mostrarEmpreses(empreses){

        empreses = Object.values(empreses);
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
        if(empreses.length == 0)
        {
            var principal = document.getElementById("principal");
            var h3 = document.createElement('h3');
            var text = document.createTextNode("No hi ha resultats per aquesta cerca.");
            h3.appendChild(text);
            principal.appendChild(h3);
        }else
        {
            //Generem amb DOM les ofertes
            for (var i = 0, len = empreses.length; i < len; i++) {
                var principal = document.getElementById("principal");
                var li = document.createElement('li');
                //Generem un li per cada oferta amb el id de la oferta
                li.setAttribute("class",empreses[i].id);
                principal.appendChild(li);
                //Generar nom del treballador
                var a = document.createElement('a');
                var h3 = document.createElement('h3');
                var linkText = document.createTextNode(empreses[i].name);
                var idEmpresa = empreses[i].idEmpresa;
                h3.appendChild(linkText);
                a.setAttribute("href","/perfilAlie/"+empreses[i].id);
                a.appendChild(h3);
                li.appendChild(a);
                //Informació del treballador
                //Zona
                var h5zona = document.createElement('h5');
                var bzona = document.createElement('b');
                var zonab = document.createTextNode("Zona: ");
                var zonah5 = document.createTextNode(empreses[i].zona);
                h5zona.appendChild(bzona);
                h5zona.appendChild(zonah5);
                bzona.appendChild(zonab);
                li.appendChild(h5zona);
                //horari
                var h5horari = document.createElement('h5');
                var bhorari = document.createElement('b');
                var horarib = document.createTextNode("Horari: ");
                var horarih5 = document.createTextNode(empreses[i].horari);
                h5horari.appendChild(bhorari);
                h5horari.appendChild(horarih5);
                bhorari.appendChild(horarib);
                li.appendChild(h5horari);
                //sector
                var h5sector = document.createElement('h5');
                var bsector = document.createElement('b');
                var sectorb = document.createTextNode("Sector: ");
                var sectorh5 = document.createTextNode(empreses[i].sector);
                h5sector.appendChild(bsector);
                h5sector.appendChild(sectorh5);
                bsector.appendChild(sectorb);
                li.appendChild(h5sector);
                //detalls
                var h5detalls = document.createElement('h5');
                var bdetalls = document.createElement('b');
                var detallsb = document.createTextNode("Correu de contacte: ");
                var detallsh5 = document.createTextNode(empreses[i].email);
                h5detalls.appendChild(bdetalls);
                h5detalls.appendChild(detallsh5);
                bdetalls.appendChild(detallsb);
                li.appendChild(h5detalls);
                //Boto per contactar amb el treballador
                var btnContactar = document.createElement("a");
                btnContactar.setAttribute("class","btn btn-primary "+empreses[i].id+" ");
                btnContactar.setAttribute("href","formulariContacte/"+empreses[i].id);
                btnContactar.innerHTML = "Contactar";
                li.appendChild(btnContactar);
                var hr = document.createElement('hr');
                li.appendChild(hr);
            }
        }
    }

    //FCridem a la funcio per obtenir totes les empreses
    obtenirEmpreses();

 </script>
@endsection
