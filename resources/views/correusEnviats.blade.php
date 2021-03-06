@extends('layouts.app')

@section('content')
<link href="{{ asset('css/ofertesTreballador.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <!--Div de les ofertes-->
    <div class="col-md-8" id="principal">
        <h1 style="text-align: center"><b>Missatges enviats.</b></h1>
        <hr>
    </div>
</div>

<script>
    //Funcio per rebre les ofertes per ajax i generar la vista per DOM
    function obtenirEmails() {
       $.ajax({
          type:'GET',
          url:'/correusEnviatsAjax',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(resposta) {
            var emails = JSON.parse(JSON.stringify(resposta.emails));
             var keys = Object.keys(emails);
             console.log(emails);
             console.log(keys.length);
              if(keys.length == 0){
                var principal = document.getElementById("principal");
                var h3 = document.createElement('h3');
                var text = document.createTextNode("Encara no has enviat cap correu amb InstaJob.");
                h3.appendChild(text);
                principal.appendChild(h3);
              }else{
                //Generem amb DOM els emails que ha enviat l'usuari
                for (var i = 0, len = keys.length; i < len; i++) {
                    var principal = document.getElementById("principal");
                    var div = document.createElement('div');
                    div.setAttribute("class",emails[keys[i]].id+" oferta");
                    principal.appendChild(div);
                    //Generar nombre de la empresa
                    var a = document.createElement('a');
                    var h3 = document.createElement('h3');
                    var text = document.createTextNode("Destinatari: ");
                    h3.appendChild(text);
                    var linkText = document.createTextNode(emails[keys[i]].nomReceptor);
                    var idEmpresa = emails[keys[i]].idEmpresa;
                    a.appendChild(linkText);
                    h3.appendChild(a);
                    div.appendChild(h3);
                    if(emails[keys[i]].zonaOferta != null){
                    //Informació de la oferta
                    var h5zona = document.createElement('h5');
                    var zonah5 = document.createTextNode("Oferta per la zona de "+emails[keys[i]].zonaOferta+". Horari: "+emails[keys[i]].horariOferta+". Sector: "+emails[keys[i]].sectorOferta+".");
                    h5zona.appendChild(zonah5);
                    div.appendChild(h5zona);
                    //detalls
                    var h5detalls = document.createElement('h5');
                    var bdetalls = document.createElement('b');
                    var detallsb = document.createTextNode("Informació detallada: ");
                    var detallsh5 = document.createTextNode(emails[keys[i]].cosOferta);
                    h5detalls.appendChild(bdetalls);
                    h5detalls.appendChild(detallsh5);
                    bdetalls.appendChild(detallsb);
                    div.appendChild(h5detalls);
                    }
                    //El meu missatge
                    var h5missatge = document.createElement('h5');
                    var bmissatge = document.createElement('b');
                    var missatgeb = document.createTextNode("El teu missatge: ");
                    var missatgeh5 = document.createTextNode(emails[keys[i]].missatgeEnviat);
                    h5missatge.appendChild(bmissatge);
                    h5missatge.appendChild(missatgeh5);
                    bmissatge.appendChild(missatgeb);
                    div.appendChild(h5missatge);
                    //Generem els botons
                    var divBotons = document.createElement("div");
                    divBotons.setAttribute("class","divBotons");
                    div.appendChild(divBotons);
                    //Posem un botó per esborrar aquell missatge
                    var btnSeguir = document.createElement("button");
                    var iEsborrar = document.createElement("i");
                    iEsborrar.setAttribute("class","fa fa-trash");
                    iEsborrar.setAttribute("aria-hidden","true");
                    btnSeguir.setAttribute("class","btn btn-danger");
                    btnSeguir.setAttribute("onclick","esborrarMissatge("+emails[keys[i]].id+")");
                    btnSeguir.innerHTML = "Esborrar missatge ";
                    btnSeguir.style.marginRight = "0.3em";
                    btnSeguir.appendChild(iEsborrar);
                    divBotons.appendChild(btnSeguir);

                }
              }
          }
       });
    }

    //Funcio per deixar de seguir a una empresa
    function esborrarMissatge($id){

        $.ajax({
        url: "/esborrarMissatge/"+$id,
        type:"DELETE",
        data:{
            "_token": "{{ csrf_token() }}",
        },
        success:function(response){
            $("."+$id).remove();
        },
        });
        }

    obtenirEmails();
</script>
@endsection
