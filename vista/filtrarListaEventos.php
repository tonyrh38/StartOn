<?php
  require_once __DIR__.'/../includes/config.php';
  $seleccionOrdenada = $_GET['q'];

  $SA = es\ucm\fdi\aw\SA_Eventos::getInstance();
  $ListOfEvents = $SA->getAllElements();

  $hint = "";
  if ($seleccionOrdenada !== "") {
    $seleccionOrdenada = strtolower($seleccionOrdenada);
    $len = strlen($seleccionOrdenada);
    $cont = 0;
    foreach($ListOfEvents as $elemento) {
      if (stristr($seleccionOrdenada, substr($elemento->getNombre(), 0, $len))) {
        if(($cont % 4) == 0){ $hint .= '<div class = "row">'; }
        $hint .=  '
        <div class="half-column">
          <div id= "card">
            <a href ="perfEvento.php?id='.$elemento->getNombre().'" ">
            <img src= "../'.$elemento->getImagenEvento().'"  style="width:100%"></a>
            <p class="burbuja" id="btitulo"> '. $elemento->getNombre(). '</p>
            <p class="burbuja"> '. $elemento->getFecha(). '</p>
            <p class="burbuja"> '. $elemento->getLocalizacion(). '</p>
            <p class="burbuja"> '. $elemento->getCantidad(). '</p>
          </div>
        </div>';
        if(($cont % 4) == 3){ $hint .= '</div>'; }
        $cont += 1;
      }
    }
  }
  echo $hint === "" ? "<h2>No hay usuarios con ese nombre...</h2>" : $hint;
?>
