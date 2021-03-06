@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesTreballador.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="principal">
            <h1 style="text-align: center"><b>Aquestes son les ofertes creades per la teva empresa.</b></h1>
            <hr>
        </div>
    </div>
</div>

<script>
    //Funcio per rebre les ofertes per ajax i generar la vista per DOM
    function obtenirOfertes() {
       $.ajax({
          type:'GET',
          url:'/ofertesCreadesAjax',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(resposta) {
            var ofertes = JSON.parse(JSON.stringify(resposta.ofertes));
             var keys = Object.keys(ofertes);
            console.log(ofertes)
             console.log(keys.length)
              if(keys.length == 0){
                console.log("No sigues a nadie");
                var principal = document.getElementById("principal");
                var h3 = document.createElement('h3');
                var text = document.createTextNode("Encara no has creat cap oferta!");
                h3.appendChild(text);
                principal.appendChild(h3);
              }else{
                //Generem amb DOM les ofertes
                for (var i = 0, len = keys.length; i < len; i++) {
                    var principal = document.getElementById("principal");
                    var div = document.createElement('div');
                    //Generem un div per cada oferta amb el id de la oferta
                    div.setAttribute("class",ofertes[keys[i]].id+" oferta");
                    principal.appendChild(div);
                    //Generar nombre de la empresa
                    var a = document.createElement('a');
                    var h3 = document.createElement('h3');
                    var linkText = document.createTextNode(ofertes[keys[i]].nomEmpresa);
                    var idEmpresa = ofertes[keys[i]].idEmpresa;
                    var img = document.createElement("img");
                    img.setAttribute("src","/recursos/pieza.png");
                    img.setAttribute("class","pieza");
                    h3.appendChild(img);
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
                    var divBotons = document.createElement("div");
                    divBotons.setAttribute("class","divBotons");
                    div.appendChild(divBotons);
                    //Boto per editar la oferta
                    var btnEditar = document.createElement("a");
                    var iEditar = document.createElement("i");
                    iEditar.setAttribute("class","fa fa-pencil");
                    iEditar.setAttribute("aria-hidden","true");
                    btnEditar.setAttribute("class","btn btn-warning");
                    btnEditar.setAttribute("href","/editarOferta/"+ofertes[keys[i]].id);
                    btnEditar.innerHTML = "Editar oferta ";
                    btnEditar.appendChild(iEditar);
                    divBotons.appendChild(btnEditar);
                    //Generem el boto per eliminar la oferta
                    var btnDelete = document.createElement("button");
                    var iDelete = document.createElement("i");
                    iDelete.setAttribute("class","fa fa-trash");
                    iDelete.setAttribute("aria-hidden","true");
                    btnDelete.setAttribute("class","btn btn-danger");
                    btnDelete.setAttribute("onclick","eliminarOferta("+ofertes[keys[i]].id+")");
                    btnDelete.innerHTML = "Eliminar oferta ";
                    btnDelete.appendChild(iDelete);
                    divBotons.appendChild(btnDelete);
                }
              }
          }
       });
    }

    //Funcio per deixar de seguir a una empresa
    function eliminarOferta($id){

        $.ajax({
          url: "/esborrarMevaOferta/"+$id,
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
