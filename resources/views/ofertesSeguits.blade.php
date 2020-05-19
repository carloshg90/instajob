@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <!--Div de les ofertes-->
        <div class="col-8" id="principal">
            <h1 style="text-align: center"><b>Ofertes que ofereixen les empreses a les quals segueixes.</b></h1>
            <hr>
        </div>
        <!--Div dels botons-->
    <div class="col-2">
        <div class="col-12">
            <a href="{{ url('/ofertesSectorZona') }}" class="btn btn-outline-dark" style="margin-bottom: 1em">
            Ofertes per sector i zona.
            </a>
        </div>
        <div class="col-12">
            <a href="{{ url('/ofertesSeguits') }}" class="btn btn-outline-dark" style="margin-bottom: 1em">
            Ofertes de les mepreses que segueixo.
            </a>
        </div>
        <div class="col-12">
            <a href="{{ url('/correusEnviats') }}" class="btn btn-outline-dark" style="margin-bottom: 1em">
            Veure els meus correus enviats.
            </a>
        </div>
        <div class="col-12">
            <a href="{{ url('/buscarEmpreses') }}" class="btn btn-outline-dark" style="margin-bottom: 1em">
                Buscar empreses.
            </a>
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
             console.log(ofertes)

              if(ofertes[0].id == null){
                console.log("No sigues a nadie");
                var principal = document.getElementById("principal");
                var h3 = document.createElement('h3');
                var text = document.createTextNode("Encara no segueixes a cap empresa.");
                h3.appendChild(text);
                principal.appendChild(h3);
              }else{
                //Generem amb DOM les ofertes
                for (var i = 0, len = keys.length; i < len; i++) {
                    var principal = document.getElementById("principal");
                    var div = document.createElement('div');
                    //Generem un div per cada oferta amb el id de la oferta
                    div.setAttribute("class",ofertes[keys[i]].idEmpresa);
                    principal.appendChild(div);
                    //Generar nombre de la empresa
                    var a = document.createElement('a');
                    var h3 = document.createElement('h3');
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
                    //Generem el boto per deixar de seguir a l'empresa
                    var btnSeguir = document.createElement("button");
                    btnSeguir.setAttribute("class","btn btn-danger");
                    btnSeguir.setAttribute("onclick","deixarDeSeguir("+ofertes[keys[i]].idEmpresa+")");
                    btnSeguir.innerHTML = "Deixar de seguir a l'empresa";
                    btnSeguir.style.marginRight = "0.3em";
                    div.appendChild(btnSeguir);
                    //Generem el boto per contactar amb l'empresa
                    var btnContactar = document.createElement("a");
                    btnContactar.setAttribute("class","btn btn-success "+ofertes[keys[i]].idEmpresa+" ");
                    btnContactar.setAttribute("href","formMail/"+ofertes[keys[i]].idEmpresa);
                    btnContactar.innerHTML = "M'interesa aquesta oferta!";
                    div.appendChild(btnContactar);
                    var hr = document.createElement('hr');
                    div.appendChild(hr);
                }
              }
          }
       });
    }

    //Funcio per deixar de seguir a una empresa
    function deixarDeSeguir($id){

        $.ajax({
          url: "/ofertesAjaxBorrar/"+$id,
          type:"DELETE",
          data:{
            "_token": "{{ csrf_token() }}",
          },
          success:function(response){
            $("."+$id).remove();
          },
         });
    }

    //Funcio per mostrar totes les ofertes
    obtenirOfertes();
 </script>

@endsection
