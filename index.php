<?php
	require_once('backend/lib/db.php');
  require_once('respuesta.php');

  if(isset($_GET["id"])) {
      $username     = $_GET["id"];
      $lstsecciones = get_secciones($username);
  } else  {
    $username = "";
    $lstsecciones = "";
  }

//  echo 'user: '.$username .'sec: '.$lstsecciones;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0000, minimum-scale=1.0000, maximum-scale=1.0000, user-scalable=yes">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
  </head>
    <title>Volkswagen</title>
  <body>
  <div class="mainContainer">
    <header> <img src="img/ic.svg" height="10"> </header>
    <!-- LISTA DE BOTONES TUTORIALES -->
    <ul id="tutorialIndex">
      <!-- BTN TUTORIAL 1: DASHBOARD -->
      <li class="seenTut" id="dashIc">
        <a role="button" onclick="popPreview('open', 8, this, 'Dashboard', 'dashIc','<?php echo $username; ?>')" class="displayFlex">
          <div class="indexTut displayFlex">1</div>
          <div class="infoTut displayFlex">
            <h2>DASHBOARD</h2>
            <p>En esta sección podrás consultar tus métricas principales y navegar por la plataforma.</p>
          </div>
        </a>
        <div class="hoverTut trans5">
          <p onclick="popPreview('open', 8, this, 'Dashboard', 'dashIc','<?php echo $username; ?>')">COMENZAR TUTORIAL →</p>
        </div>
      </li>
      <!-- BTN TUTORIAL 2: PARRILA DE CONTENIDO -->
      <li class="seenTut" id="parrilaIc">
        <a role="button" onclick="popPreview('open', 5, this, 'Parrilla De Contenido', 'parrilaIc','<?php echo $username; ?>')" class="displayFlex">
          <div class="indexTut displayFlex">2</div>
          <div class="infoTut displayFlex">
            <h2>PARRILLA DE CONTENIDO</h2>
            <p>En esta sección podrás programar tu parrilla mensual.</p>
          </div>
        </a>
        <div class="hoverTut trans5">
          <p onclick="popPreview('open', 5, this, 'Parrilla De Contenido', 'parrilaIc','<?php echo $username; ?>')">COMENZAR TUTORIAL →</p>
        </div>
      </li>
      <!-- BTN TUTORIAL 3: BIBLIOTECA DE CONTENIDO -->
      <li class="seenTut" id="bibliotecaIc">
        <a role="button" onclick="popPreview('open', 3, this, 'Biblioteca de Contenido', 'bibliotecaIc','<?php echo $username; ?>')" class="displayFlex">
          <div class="indexTut displayFlex">3</div>
          <div class="infoTut displayFlex">
            <h2>BIBLIOTECA DE CONTENIDO</h2>
            <p>En esta sección podrás encontrar los contenidos que retail marketing pone a tus disposición.</p>
          </div>
        </a>
        <div class="hoverTut trans5">
          <p onclick="popPreview('open', 3, this, 'Biblioteca de Contenido', 'bibliotecaIc','<?php echo $username; ?>')">COMENZAR TUTORIAL →</p>
        </div>
      </li>
      <!-- BTN TUTORIAL 4: MIS MATERIALES -->
      <li class="seenTut" id="materialesIc">
        <a role="button" onclick="popPreview('open', 4, this, 'Mis Materiales', 'materialesIc','<?php echo $username; ?>')" class="displayFlex">
          <div class="indexTut displayFlex">4</div>
          <div class="infoTut displayFlex">
            <h2>MIS MATERIALES</h2>
            <p>En esta sección podrás subir contenido creado especialmente para tu concesionaria.</p>
          </div>
        </a>
        <div class="hoverTut trans5">
          <p onclick="popPreview('open', 4, this, 'Mis Materiales', 'materialesIc','<?php echo $username; ?>')">COMENZAR TUTORIAL →</p>
        </div>
      </li>
      <!-- BTN TUTORIAL 5: HISTORIAL DE PUBLICACIONES -->
      <li class="seenTut" id="historialIc">
        <a role="button" onclick="popPreview('open', 4, this, 'Historial de Publicaciones', 'historialIc','<?php echo $username; ?>')" class="displayFlex">
          <div class="indexTut displayFlex">5</div>
          <div class="infoTut displayFlex">
            <h2>HISTORIAL DE PUBLICACIONES</h2>
            <p>En esta sección podrás visualizar los contenidos que hayas publicado anteriormente, así como sus métricas.</p>
          </div>
        </a>
        <div class="hoverTut trans5">
          <p onclick="popPreview('open', 4, this, 'Historial de Publicaciones', 'historialIc','<?php echo $username; ?>')">COMENZAR TUTORIAL →</p>
        </div>
      </li>
      <!-- BTN TUTORIAL 6: MÉTRICAS -->
      <li class="seenTut" id="metricasIc">
        <a role="button" onclick="popPreview('open', 4, this, 'Métricas', 'metricasIc','<?php echo $username; ?>')" class="displayFlex">
          <div class="indexTut displayFlex">6</div>
          <div class="infoTut displayFlex">
            <h2>MÉTRICAS</h2>
            <p>En esta sección podrás visualizar el desempeño de tu actividad y publicaciones.</p>
          </div>
        </a>
        <div class="hoverTut trans5">
          <p onclick="popPreview('open', 4, this, 'Métricas', 'metricasIc','<?php echo $username; ?>')">COMENZAR TUTORIAL →</p>
        </div>
      </li>
    </ul>
  </div>
  <!-- POP TUTORIAL -->
  <div id="popTut" class="trans8">
      <!--
    <nav class="displayFlex">
      <a role="button">
        <img src="img/logo-vw-header.svg">
      </a>
      <div>
        <img src="img/social-dealer-logo.svg">
      </div>
    </nav>
    -->
    <div id="containerTut">
      <header id="headTut">
        <div id="iconTut" class="dashIc"></div>
        <h3 id="titleTut">Dashboard</h3>
        <span></span>
      </header>
      <div id="mainContainerTut" class="displayFlex">
        <a role="button" onclick="arrowsSlider('prev')" id="prevTut" class="arrowTut trans5">
          <img src="img/iconsTut/arrowTut.svg" class="cw180" width="30" height="30">
        </a>
        <div id="sliderContainerTut">
          <ul id="sliderTut" class="displayFlex trans5"></ul>
        </div>
        <a role="button" onclick="arrowsSlider('next')" id="nextTut" class="arrowTut trans5">
          <img src="img/iconsTut/arrowTut.svg" width="30" height="30">
        </a>
        <div id="swipeTut"></div>
      </div>
      <div id="bulletsContainerTut">
        <ul id="bulletsTut" class="displayFlex"> </ul>
      </div>
    </div>
    <div id="footTut" class="displayFlex">
      <a role="button" class="trans5" onclick="popPreview('close', 0, this, 'Titulo', 'file','user')" id="btnTerminar">
        <span class="trans5"></span>
        <p class="trans5">Terminar Tutorial</p>
      </a>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/main.js" charset="utf-8"></script>
  <script>
      window.onload = function(){
        detectswipe("swipeTut", swipeTransform);
      }

      $(document).ready(function(){
        console.log('ready');
        var secciones = "<?php echo $lstsecciones; ?>";
        var list = secciones.split(',');

        console.log(secciones);

        for (var i = 0; i < list.length; i++) {
          $("#"+list[i]).removeClass("seenTut");
          $("#"+list[i]).addClass("noseenTut");
        }

      });

      $(document).keydown(function (e){
          if(e.keyCode == 37) // left arrow
          {
              arrowsSlider('prev');
          }
          else if(e.keyCode == 39)    // right arrow
          {
              arrowsSlider('next')
          }
					else if(e.keyCode == 13)    // enter
					{
						 $("#btnTerminar").click();
					}
    });

  </script>
  </body>
</html>
