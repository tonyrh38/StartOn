<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
$seleccionOrdenada = $_GET['q'];

$SA = SA_Usuario::getInstance();
$ListOfUsuario = $SA->getAllElements();

$hint = "";
if ($seleccionOrdenada !== "") {
$seleccionOrdenada = strtolower($seleccionOrdenada);
$len = strlen($seleccionOrdenada);

foreach($ListOfUsuario as $elemento) {
    if (stristr($seleccionOrdenada, substr($elemento->getNombre(), 0, $len))) {
        if ($hint === "") {
            $hint = ' <div id= "card">
                <a href ="perfUser.php?id='.$elemento->getId_Usuario().'"
              ><img src= "../'.$elemento->getImagenPerfil().'"  style="width:100%"></a>
    					 <p class="burbuja" id="btitulo"> '. $elemento->getNombre() .' '. $elemento->getApellido(). '</p>
    						<p class="burbuja"> '. $elemento->getOficio(). '</p>
    						<p class="burbuja"> '. $elemento->getLocalizacion(). '</p>
    				</div>';
        } else {
            $hint .= 	' <div id= "card">
                <a href ="perfUser.php?id='.$elemento->getId_Usuario().'"
              ><img src= "../'.$elemento->getImagenPerfil().'"  style="width:100%"></a>
    					 <p class="burbuja" id="btitulo"> '. $elemento->getNombre() .' '. $elemento->getApellido(). '</p>
    						<p class="burbuja"> '. $elemento->getOficio(). '</p>
    						<p class="burbuja"> '. $elemento->getLocalizacion(). '</p>
    				</div>';
        }
    }
}

}
echo $hint === "" ? "<h2>No hay usuarios con ese nombre...</h2>" : $hint;
?>
