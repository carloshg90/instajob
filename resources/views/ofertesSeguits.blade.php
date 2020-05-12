@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="principal">
            <h1>Aquestes son les ofertes de les empreses a les que segueixes</h1>
        </div>
    </div>
</div>

<script>
    //Funcio per rebre les ofertes per ajax i generar la vista per DOM
    function obtenirOfertes() {
       $.ajax({
          type:'GET',
          url:'/ofertesSeguitsAjax',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(resposta) {
            var ofertes = JSON.parse(JSON.stringify(resposta.ofertes));
             var keys = Object.keys(ofertes);
             console.log(ofertes);
              if(keys == 0){
                console.log("No hay ofertas");
              }else{
                //Generem amb DOM les ofertes
                for (var i = 0, len = keys.length; i < len; i++) {
                    console.log(ofertes[keys[i]].id);
                    var principal = document.getElementById("principal");
                    //Generar nombre de la empresa
                    var a = document.createElement('a');
                    var h3 = document.createElement('h3');
                    var linkText = document.createTextNode(ofertes[keys[i]].nomEmpresa);
                    var idEmpresa = ofertes[keys[i]].idEmpresa;
                    h3.appendChild(linkText);
                    a.setAttribute("href","/perfilAlie/"+ofertes[keys[i]].idEmpresa);
                    a.appendChild(h3);
                    principal.appendChild(a);
                    //Informació de la oferta
                    //Zona
                    var h5zona = document.createElement('h5');
                    var bzona = document.createElement('b');
                    var zonab = document.createTextNode("Zona: ");
                    var zonah5 = document.createTextNode(ofertes[keys[i]].zona);
                    h5zona.appendChild(bzona);
                    h5zona.appendChild(zonah5);
                    bzona.appendChild(zonab);
                    principal.appendChild(h5zona);
                    //horari
                    var h5horari = document.createElement('h5');
                    var bhorari = document.createElement('b');
                    var horarib = document.createTextNode("Horari: ");
                    var horarih5 = document.createTextNode(ofertes[keys[i]].horari);
                    h5horari.appendChild(bhorari);
                    h5horari.appendChild(horarih5);
                    bhorari.appendChild(horarib);
                    principal.appendChild(h5horari);
                    //sector
                    var h5sector = document.createElement('h5');
                    var bsector = document.createElement('b');
                    var sectorb = document.createTextNode("Sector: ");
                    var sectorh5 = document.createTextNode(ofertes[keys[i]].sector);
                    h5sector.appendChild(bsector);
                    h5sector.appendChild(sectorh5);
                    bsector.appendChild(sectorb);
                    principal.appendChild(h5sector);
                    //detalls
                    var h5detalls = document.createElement('h5');
                    var bdetalls = document.createElement('b');
                    var detallsb = document.createTextNode("Informació detallada: ");
                    var detallsh5 = document.createTextNode(ofertes[keys[i]].cos);
                    h5detalls.appendChild(bdetalls);
                    h5detalls.appendChild(detallsh5);
                    bdetalls.appendChild(detallsb);
                    principal.appendChild(h5detalls);
                    //Generem els botons
                    //<button onclick="seguir()"></button>
                    /*var btnSeguir = document.createElement("button");
                    btnSeguir.setAttribute("class","btn btn-success");
                    btnSeguir.setAttribute("onclick","seguir("+ofertes[keys[i]].idEmpresa+")");
                    btnSeguir.innerHTML = "Seguir empresa";
                    principal.appendChild(btnSeguir);*/
                    //<button onclick="deixarDeSeguir()"></button>
                    var btnSeguir = document.createElement("button");
                    btnSeguir.setAttribute("class","btn btn-danger");
                    btnSeguir.setAttribute("onclick","deixarDeSeguir("+ofertes[keys[i]].idEmpresa+")");
                    btnSeguir.innerHTML = "Deixar de seguir";
                    principal.appendChild(btnSeguir);
                    var hr = document.createElement('hr');
                    principal.appendChild(hr);
                }
              }
          }
       });
    }

    //Funcio per seguir a una empresa
    function seguir($id){

        $.ajax({
          url: "/ofertesAjaxDelete/"+$id,
          type:"DELETE",
          data:{
            "_token": "{{ csrf_token() }}",
          },
          success:function(response){
            alert("Has seguita l'empresa amb id: "+$id)
          },
         });


    }

    //Funcio per deixar de seguir a una empresa
    function deixarDeSeguir($id){

        $.ajax({
          url: "/ofertesAjaxDelete/"+$id,
          type:"DELETE",
          data:{
            "_token": "{{ csrf_token() }}",
          },
          success:function(response){
            alert("Has deixat de seguir a l'empresa amb id: "+$id)
          },
         });
    }

    //Funcio per mostrar totes les ofertes
    obtenirOfertes();
 </script>

@endsection
