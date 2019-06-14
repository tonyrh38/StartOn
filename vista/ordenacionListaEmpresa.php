<?php
    require_once ("../includes/config.php");
    require_once ("../logica/SA_Empresa.php");
    $seleccionOrdenada = $_GET['q'];

    $SA = SA_Empresa::getInstance();
    $ListOfEvents = $SA->getAllElementsById($seleccionOrdenada);
    $title = "";
    $lastTitle = "";
    foreach($ListOfEvents as $value) {
      if ($seleccionOrdenada == "Sector") {
        $title = $value->getSector();
      } else if ($seleccionOrdenada == "Oficio") {
        $title = $value->getOficio();
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
          echo '<a href ="perfEmp.php?id='.$value->getId_Empresa().'" ><img src= "../'.$value->getImagenPerfil().'"  style="width:100%"></a>';
          echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
          echo '<p class="burbuja"> '. $value->getFase(). '</p>';
          echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
          echo '<p class="burbuja" id="btexto"> '. $value->getCartaPresentacion(). '</p>';
        echo'</div>';
    }
    if ($lastTitle != "") {
        echo'</div>';
    }
?>
