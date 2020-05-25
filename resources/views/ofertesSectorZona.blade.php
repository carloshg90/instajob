@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesSectorZona.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <!--Div de les ofertes-->
        <div class="col-md-8" id="principal">
            <h1 style="text-align: center"><b>Ofertes que coincideixen amb el teu setor i zona de treball.</b></h1>
            <hr>
        </div>
    </div>
</div>

<script>
    //Funcio per rebre les ofertes per ajax i generar la vista per DOM
    function obtenirOfertes() {
       $.ajax({
          type:'GET',
          url:'/ofertesAjax',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(resposta) {
            var ofertes = JSON.parse(JSON.stringify(resposta.ofertes));
             var keys = Object.keys(ofertes);
             console.log(keys.length);
              if(keys.length == 0){
                var principal = document.getElementById("principal");
                var h3 = document.createElement('h3');
                var text = document.createTextNode("No hi ha ofertes relacionades amb el teu sector i zona.");
                h3.appendChild(text);
                principal.appendChild(h3);
              }else{
                //Generem amb DOM les ofertes
                for (var i = 0, len = keys.length; i < len; i++) {
                    var principal = document.getElementById("principal");
                    var div = document.createElement('div');
                    div.setAttribute("class",ofertes[keys[i]].idEmpresa);
                    principal.appendChild(div);
                    //Generar nombre de la empresa
                    var a = document.createElement('a');
                    var h3 = document.createElement('h3');
                    h3.setAttribute("class","nomEmpresa");
                    var img = document.createElement("img");
                    img.setAttribute("src","/recursos/pieza.png");
                    img.setAttribute("class","pieza");
                    h3.appendChild(img);
                    var linkText = document.createTextNode(ofertes[keys[i]].nomEmpresa);
                    var idEmpresa = ofertes[keys[i]].idEmpresa;
                    h3.appendChild(linkText);
                    a.setAttribute("href","/perfilAlie/"+ofertes[keys[i]].idEmpresa);
                    a.appendChild(h3);
                    div.appendChild(a);
                    //Informació de la oferta
                    //Zona
                    var h5zona = document.createElement('h5');
                    var bzona = document.createElement('b');
                    var zonab = document.createTextNode("Zona: ");
                    var zonah5 = document.createTextNode(ofertes[keys[i]].zona);
                    h5zona.appendChild(bzona);
                    h5zona.appendChild(zonah5);
                    bzona.appendChild(zonab);
                    div.appendChild(h5zona);
                    //horari
                    var h5horari = document.createElement('h5');
                    var bhorari = document.createElement('b');
                    var horarib = document.createTextNode("Horari: ");
                    var horarih5 = document.createTextNode(ofertes[keys[i]].horari);
                    h5horari.appendChild(bhorari);
                    h5horari.appendChild(horarih5);
                    bhorari.appendChild(horarib);
                    div.appendChild(h5horari);
                    //sector
                    var h5sector = document.createElement('h5');
                    var bsector = document.createElement('b');
                    var sectorb = document.createTextNode("Sector: ");
                    var sectorh5 = document.createTextNode(ofertes[keys[i]].sector);
                    h5sector.appendChild(bsector);
                    h5sector.appendChild(sectorh5);
                    bsector.appendChild(sectorb);
                    div.appendChild(h5sector);
                    //detalls
                    var h5detalls = document.createElement('h5');
                    var bdetalls = document.createElement('b');
                    var detallsb = document.createTextNode("Informació detallada: ");
                    var detallsh5 = document.createTextNode(ofertes[keys[i]].cos);
                    h5detalls.appendChild(bdetalls);
                    h5detalls.appendChild(detallsh5);
                    bdetalls.appendChild(detallsb);
                    div.appendChild(h5detalls);
                    //Generem els botons
                    //SEGUIR
                    var btnSeguir = document.createElement("button");
                    var iSeguir = document.createElement("i");
                    iSeguir.setAttribute("class","fa fa-heart");
                    iSeguir.setAttribute("aria-hidden","true");
                    btnSeguir.setAttribute("class","btn btn-success "+ofertes[keys[i]].idEmpresa+" ");
                    btnSeguir.setAttribute("onclick","seguir("+ofertes[keys[i]].idEmpresa+")");
                    btnSeguir.innerHTML = "Seguir a questa empresa! ";
                    btnSeguir.appendChild(iSeguir);
                    div.appendChild(btnSeguir);
                    //MISSATGE
                    var btnContactar = document.createElement("a");
                    var iContactar = document.createElement("i");
                    iContactar.setAttribute("class","fa fa-envelope");
                    iContactar.setAttribute("aria-hidden","true");
                    btnContactar.setAttribute("class","btn btn-primary "+ofertes[keys[i]].idEmpresa+" ");
                    btnContactar.setAttribute("href","formMail/"+ofertes[keys[i]].id);
                    btnContactar.innerHTML = "M'interesa l'oferta! ";
                    btnContactar.appendChild(iContactar);
                    div.appendChild(btnContactar);
                    var hr = document.createElement('hr');
                    div.appendChild(hr);
                }
              }
          }
       });
    }

    //Funcio per seguir a una empresa
    function seguir($id){
        $.ajax({
          url: "/ofertesAjaxSeguir/"+$id,
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
          },
          success:function(response){
            console.log("Seguit");
            $("."+$id).remove();
          },
         });
    }

    //Funcio per mostrar totes les ofertes
    obtenirOfertes();
 </script>

@endsection
