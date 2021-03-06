<!DOCTYPE html>
<html>
 <head>
  <title>Message</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <!-- Styles -->
  <style>
      html, body {
          background-color: #fff;
          color: #000000;
          font-family: 'Nunito', sans-serif;
          font-weight: 200;
          height: 100vh;
          margin: 0;
      }
      .content { text-align: center; }
      .title { font-size: 84px; }
  </style>
 </head>
 <body><div class="container box">

    <h2>Algú està interesat en la teva oferta de treball!</h2>
    <h3>
        Detalls de la teva oferta:
    </h3>

       <label>Zona: <b>{{ $data['zonaOferta'] }}</b></label>
       <br>
       <label>Horari: <b>{{ $data['horariOferta'] }}</b></label>
       <br>
       <label>Sector: <b>{{ $data['sectorOferta'] }}</b></label>
       <br>
       <label>Descripció de la teva oferta: <b>{{ $data['cosOferta'] }}</b></label>
       <br>
       <hr>
    <p>Missatge del solicitant:</p>
    <h4>{{ $data['message'] }}</h4>
    <p>Si necessites més informació o vols contactar amb aquest/a candidat/a pots posar en contacte amb ell/ella mitjançant la seva direcció de correu: <b>{{ $data['emailContacte'] }}</b>. Molta sort!</p>
    <hr>
    <h4>Aquest missatge ha sigut enviat des de una direcció de correu que no admet missatges, entra a la nostra web per més informació.</h4>
</div>
 </body>
</html>
