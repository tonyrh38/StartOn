<?php
    require_once ("../includes/config.php");
    require_once ("../logica/SA_Eventos.php");
    $seleccionOrdenada = $_GET['q'];

    $SA = SA_Eventos::getInstance();
    $ListOfEvents = $SA->getAllElements();

    $hint = "";
    if ($seleccionOrdenada !== "") {
    $seleccionOrdenada = strtolower($seleccionOrdenada);
    $len = strlen($seleccionOrdenada);

    foreach($ListOfEvents as $elemento) {
        if (stristr($seleccionOrdenada, substr($elemento->getNombre(), 0, $len))) {
            if ($hint === "") {
                $hint =  '<div id= "card">
                   <a href ="/ProyectoStartOn/vista/perfEvento.php?id='.$elemento->getNombre().'" "><img src= "/ProyectoStartOn/img/'.$elemento->getImagenEvento().'"  style="width:100%"></a>
                   <p class="burbuja" id="btitulo"> '. $elemento->getNombre(). '</p>
                   <p class="burbuja"> '. $elemento->getFecha(). '</p>
                   <p class="burbuja"> '. $elemento->getLocalizacion(). '</p>
                   <p class="burbuja"> '. $elemento->getCantidad(). '</p>
                </div>';
            } else {
                $hint .= '<div id= "card">
                   <a href ="/ProyectoStartOn/vista/perfEvento.php?id='.$elemento->getNombre().'" "><img src= "/ProyectoStartOn/img/'.$elemento->getImagenEvento().'"  style="width:100%"></a>
                   <p class="burbuja" id="btitulo"> '. $elemento->getNombre(). '</p>
                   <p class="burbuja"> '. $elemento->getFecha(). '</p>
                   <p class="burbuja"> '. $elemento->getLocalizacion(). '</p>
                   <p class="burbuja"> '. $elemento->getCantidad(). '</p>
                </div>';
            }
        }
    }

  }
  echo $hint === "" ? "<h2>No hay usuarios con ese nombre...</h2>" : $hint;
?>
