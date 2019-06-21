<?php
  require_once __DIR__.'/../includes/config.php';
    
  $seleccionOrdenada = $_GET['q'];

  $SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
  $ListOfEvents = $SA->getAllElementsById($seleccionOrdenada);
  $categoriaActual = "";
  $categoriaAux = "";
  $cont = 0;
  foreach($ListOfEvents as $value) {
    if ($seleccionOrdenada == "Oficio") {
      $categoriaActual = $value->getOficio();
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
      echo "
      <div class = 'half-column'>
        <div id= 'card'>
          <a href ='perfUser.php?id=".$value->getId_Usuario()."'>
          <img src= '../".$value->getImagenPerfil()."'></a>
          <p class='burbuja' id='btitulo'>".$value->getNombre()." ".$value->getApellido()."</p>";
          if (!empty($value->getOficio())) {
            echo "<p class='burbuja'> ".$value->getOficio()."</p>";
          }
          if (!empty($value->getLocalizacion())) {
            echo '<p class="burbuja"> '.$value->getLocalizacion().'</p>';
          }
        echo'</div>';
      echo "</div>";
      if(($cont % 4) == 3){ echo '</div>'; }
      $cont += 1;
  }
?>
