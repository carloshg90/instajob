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
    <h2>Algú vol contactar amb tú des de InstaJob!</h2>
        Han deixat el següent missatge per tu:
    </h3>
    <h4>{{ $data['message'] }}</h4>
    <p>Pots contestar mitjançant la seva direcció de correu: <b>{{ $data['emailContacte'] }}</b>, o entrant a Instajob.</p>
    <hr>
    <h4>Aquest missatge ha sigut enviat des de una direcció de correu que no admet missatges, entra a la nostra web per més informació.</h4>
</div>
 </body>
</html>
