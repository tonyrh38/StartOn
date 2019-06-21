<?php
  require_once __DIR__.'/../includes/config.php';
  $seleccionOrdenada = $_GET['q'];

  $SA = es\ucm\fdi\aw\SA_Eventos::getInstance();
  $ListOfEvents = $SA->getAllElementsById($seleccionOrdenada);
  $categoriaActual = "";
  $categoriaAux = "";
  $cont = 0;
  foreach($ListOfEvents as $value) {
    if ($seleccionOrdenada == "Fecha") {
      $categoriaActual = $value->getFecha();
      $fecha = explode('-', $categoriaActual);
      $categoriaActual = traducirMes($fecha[1]);
    } else if ($seleccionOrdenada == "Precio") {
      $categoriaActual = $value->getPrecio();
    } else if ($seleccionOrdenada == "Localizacion") {
      $categoriaActual = $value->getLocalizacion();
    }
    if ($categoriaAux != $categoriaActual) {
      if ($cont > 0 && ($cont % 4) != 0) {
        echo "</div>";
      }
      $cont = 0;
      $categoriaAux = $categoriaActual;
      echo '<div class="row"><h2>'.$categoriaActual.'</h2></div>';
    }
    if(($cont % 4) == 0){ echo '<div class = "row">'; }
      echo '
      <div class = "half-column">
        <div id= "card">
          <a href ="perfEvento.php?id='.$value->getNombre().'" ">
          <img src= "../'.$value->getImagenEvento().'"></a>
          <p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>
          <p class="burbuja">'.$value->getFecha().'</p>
          <p class="burbuja"> '. $value->getLocalizacion(). '</p>
          <p class="burbuja"> '. $value->getCantidad(). '</p>
        </div>
      </div>';
      if(($cont % 4) == 3){ echo '</div>'; }
      $cont += 1;
  }

  function traducirMes($mes) {
    if($mes == '01') {
      $mes = "Enero";
    }
    else if($mes == '02') {
      $mes = "Febrero";
    }
    else if($mes == '03') {
      $mes = "Marzo";
    }
    else if($mes == '04') {
      $mes = "Abril";
    }
    else if($mes == '05') {
      $mes = "Mayo";
    }
    else if($mes == '06') {
      $mes = "Junio";
    }
    else if($mes == '07') {
      $mes = "Julio";
    }
    else if($mes == '08') {
      $mes = "Agosto";
    }
    else if($mes == '09') {
      $mes = "Septiembre";
    }
    else if($mes == '10') {
      $mes = "Octubre";
    }
    else if($mes == '11') {
      $mes = "Noviembre";
    }
    else if($mes == '12') {
      $mes = "Diciembre";
    }
    return $mes;
  }
?>
