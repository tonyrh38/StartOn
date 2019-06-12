<?php
    require_once ("../includes/config.php");
    require_once ("../logica/SA_Eventos.php");
    $seleccionOrdenada = $_GET['q'];

    $SA = SA_Eventos::getInstance();
    $ListOfEvents = $SA->getAllElementsById($seleccionOrdenada);
    $title = "";
    $lastTitle = "";
    foreach($ListOfEvents as $value) {
      if ($seleccionOrdenada == "Fecha") {
        $title = $value->getFecha();
        $fecha = explode('-', $title);
        $title = traducirMes($fecha[1]);

      } else if ($seleccionOrdenada == "Precio") {
        $title = $value->getPrecio();
      } else if ($seleccionOrdenada == "Localizacion") {
        $title = $value->getLocalizacion();
      }
      if ($lastTitle != $title) {
        if ($lastTitle != "") {
            echo'</div>';
        }
        echo '<div class = "row">';
        $lastTitle = $title;
        echo '<h2>'.$lastTitle.'</h2>';
        }
        echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
          echo '<a href ="/ProyectoStartOn/vista/perfEvento.php?id='.$value->getNombre().'" "><img src= "/ProyectoStartOn/img/'.$value->getImagenEvento().'"  style="width:100%"></a>';
          echo '<p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
          echo '<p class="burbuja"> '. $value->getFecha(). '</p>';
          echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
          echo '<p class="burbuja"> '. $value->getCantidad(). '</p>';
        echo'</div>';
    }
    if ($lastTitle != "") {
        echo'</div>';
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
