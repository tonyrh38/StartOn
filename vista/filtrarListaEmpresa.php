<?php
    require_once ("../includes/config.php");
    require_once ("../logica/SA_Empresa.php");
    $seleccionOrdenada = $_GET['q'];

    $SA = SA_Empresa::getInstance();
    $ListOfEmpresa = $SA->getAllElements();

    $hint = "";
    if ($seleccionOrdenada !== "") {
    $seleccionOrdenada = strtolower($seleccionOrdenada);
    $len = strlen($seleccionOrdenada);

    foreach($ListOfEmpresa as $elemento) {
        if (stristr($seleccionOrdenada, substr($elemento->getNombre(), 0, $len))) {
            if ($hint === "") {
                $hint =  	'<div id= "card">
        						 <a href ="perfEmp.php?id='.$elemento->getId_Empresa().'" ><img src= "../'.$elemento->getImagenPerfil().'"  style="width:100%"></a>
        						  <p class="burbuja" id="btitulo"> '. $elemento->getNombre(). '</p>
        						 <p class="burbuja"> '. $elemento->getFase(). '</p>
        						 <p class="burbuja"> '. $elemento->getLocalizacion(). '</p>
        						 <p class="burbuja" id="btexto"> '. $elemento->getCartaPresentacion(). '</p>
        					</div>';
            } else {
                $hint .= 	'<div id= "card">
        						 <a href ="perfEmp.php?id='.$elemento->getId_Empresa().'" ><img src= "../'.$elemento->getImagenPerfil().'"  style="width:100%"></a>
        						  <p class="burbuja" id="btitulo"> '. $elemento->getNombre(). '</p>
        						 <p class="burbuja"> '. $elemento->getFase(). '</p>
        						 <p class="burbuja"> '. $elemento->getLocalizacion(). '</p>
        						 <p class="burbuja" id="btexto"> '. $elemento->getCartaPresentacion(). '</p>
        					</div>';
            }
        }
    }

  }
  echo $hint === "" ? "<h2>No hay usuarios con ese nombre...</h2>" : $hint;
?>
