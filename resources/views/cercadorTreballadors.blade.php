@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1><b>Busca aquí possibles treballadors.</b></h1>
            <input type="text" class="form-control" placeholder="Busca aqui a possibles treballadors">
            <hr>
            <div class="col-12" id="principal">

            </div>
        </div>

        <div class="col-2">

            <div class="col-12">
                <a href="http://localhost:8000/ofertes" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Crear una oferta.
                </a>
            </div>

            <div class="col-12">
                <a href="http://localhost:8000/ofertesCreades" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Les meves ofertes.
                </a>
            </div>
            <div class="col-12">
                <a href="http://localhost:8000/correusEnviatsEmpresa" class="btn btn-outline-dark" style="margin-bottom: 1em">
                    Veure correus enviats.
                </a>
            </div>

            <div class="col-12">
                <a href="http://localhost:8000/buscarTreballadors" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Buscar treballadors.
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    //Funcio per rebre les ofertes per ajax i generar la vista per DOM
    function obtenirTreballadors() {
       $.ajax({
          type:'GET',
          url:'/obtenirTreballadors',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(resposta) {
            var treballadors = JSON.parse(JSON.stringify(resposta.treballadors));
             var keys = Object.keys(treballadors);
            console.log(treballadors)
              if(keys.length == 0){
                console.log("No sigues a nadie");
                var principal = document.getElementById("principal");
                var h3 = document.createElement('h3');
                var text = document.createTextNode("La web encara no te registrada cap empresa.");
                h3.appendChild(text);
                principal.appendChild(h3);
              }else{
                //Generem amb DOM les ofertes
                for (var i = 0, len = keys.length; i < len; i++) {
                    var principal = document.getElementById("principal");
                    var div = document.createElement('div');
                    //Generem un div per cada oferta amb el id de la oferta
                    div.setAttribute("class",treballadors[keys[i]].id);
                    principal.appendChild(div);
                    //Generar nom del treballador
                    var a = document.createElement('a');
                    var h3 = document.createElement('h3');
                    var linkText = document.createTextNode(treballadors[keys[i]].name);
                    var idEmpresa = treballadors[keys[i]].idEmpresa;
                    h3.appendChild(linkText);
                    a.setAttribute("href","/perfilAlie/"+treballadors[keys[i]].id);
                    a.appendChild(h3);
                    div.appendChild(a);
                    //Informació del treballador
                    //Zona
                    var h5zona = document.createElement('h5');
                    var bzona = document.createElement('b');
                    var zonab = document.createTextNode("Zona: ");
                    var zonah5 = document.createTextNode(treballadors[keys[i]].zona);
                    h5zona.appendChild(bzona);
                    h5zona.appendChild(zonah5);
                    bzona.appendChild(zonab);
                    div.appendChild(h5zona);
                    //horari
                    var h5horari = document.createElement('h5');
                    var bhorari = document.createElement('b');
                    var horarib = document.createTextNode("Horari: ");
                    var horarih5 = document.createTextNode(treballadors[keys[i]].horari);
                    h5horari.appendChild(bhorari);
                    h5horari.appendChild(horarih5);
                    bhorari.appendChild(horarib);
                    div.appendChild(h5horari);
                    //sector
                    var h5sector = document.createElement('h5');
                    var bsector = document.createElement('b');
                    var sectorb = document.createTextNode("Sector: ");
                    var sectorh5 = document.createTextNode(treballadors[keys[i]].sector);
                    h5sector.appendChild(bsector);
                    h5sector.appendChild(sectorh5);
                    bsector.appendChild(sectorb);
                    div.appendChild(h5sector);
                    //detalls
                    var h5detalls = document.createElement('h5');
                    var bdetalls = document.createElement('b');
                    var detallsb = document.createTextNode("Correu de contacte: ");
                    var detallsh5 = document.createTextNode(treballadors[keys[i]].email);
                    h5detalls.appendChild(bdetalls);
                    h5detalls.appendChild(detallsh5);
                    bdetalls.appendChild(detallsb);
                    div.appendChild(h5detalls);
                    //Boto per contactar amb el treballador
                    var btnContactar = document.createElement("a");
                    btnContactar.setAttribute("class","btn btn-primary "+treballadors[keys[i]].id+" ");
                    btnContactar.setAttribute("href","formulariContacte/"+treballadors[keys[i]].id);
                    btnContactar.innerHTML = "Contactar";
                    div.appendChild(btnContactar);
                    var hr = document.createElement('hr');
                    div.appendChild(hr);
                }
              }
          }
       });
    }

    //Funcio per mostrar totes les ofertes
    obtenirTreballadors();
 </script>

@endsection
