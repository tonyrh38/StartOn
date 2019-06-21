<?php
    require_once __DIR__.'/../includes/config.php';
    $seleccionOrdenada = $_GET['q'];

    $SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
    $ListOfUsuario = $SA->getAllElements();

    $hint = "";
    if ($seleccionOrdenada !== "") {
        $seleccionOrdenada = strtolower($seleccionOrdenada);
        $len = strlen($seleccionOrdenada);
        $cont = 0;
        foreach($ListOfUsuario as $elemento) {
            if (stristr($seleccionOrdenada, substr($elemento->getNombre(), 0, $len))) {
                if(($cont % 4) == 0){ $hint .= '<div class = "row">'; }
                $hint .= ' 
                <div class="half-column">
                    <div id= "card">
                        <a href ="perfUser.php?id='.$elemento->getId_Usuario().'">
                        <img src= "../'.$elemento->getImagenPerfil().'"></a>
        				<p class="burbuja" id="btitulo">'.$elemento->getNombre().' '.$elemento->getApellido().'</p>';
                        if (!empty($elemento->getOficio())) {
                            $hint .="<p class='burbuja'> ".$elemento->getOficio()."</p>";
                        }
                        if (!empty($elemento->getLocalizacion())) {
                            $hint .='<p class="burbuja"> '.$elemento->getLocalizacion().'</p>';
                        }
                $hint .= '
                    </div>
        		</div>';
                if(($cont % 4) == 3){ $hint .= '</div>'; }
                $cont += 1;
            }
        }
    }
    echo ($hint === "") ? "<h2>No hay usuarios con ese nombre...</h2>" : $hint;
?>
