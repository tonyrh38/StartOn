<?php
    require_once __DIR__.'/../includes/config.php';
    $seleccionOrdenada = $_GET['q'];

    $SA = es\ucm\fdi\aw\SA_Empresa::getInstance();
    $ListOfEmpresa = $SA->getAllElements();

    $hint = "";
    if ($seleccionOrdenada !== "") {
        $seleccionOrdenada = strtolower($seleccionOrdenada);
        $len = strlen($seleccionOrdenada);
        $cont = 0;
        foreach($ListOfEmpresa as $elemento) {
            if (stristr($seleccionOrdenada, substr($elemento->getNombre(), 0, $len))) {
                if(($cont % 4) == 0){ $hint .= '<div class = "row">'; }
                $hint .= '
                <div class="half-column">
                    <div id= "card">
                        <a href ="perfEmp.php?id='.$elemento->getId_Empresa().'" ><img src= "../'.$elemento->getImagenPerfil().'"  style="width:100%"></a>
                        <p class="burbuja" id="btitulo">'.$elemento->getNombre().'</p>';
                        if (!empty($elemento->getFase())) {
                            $hint .= '<p class="burbuja">'.$elemento->getFase().'</p>';
                        }
                        if (!empty($elemento->getLocalizacion())) {
                            $hint .= '<p class="burbuja">'.$elemento->getLocalizacion().'</p>';
                        }
                        if (!empty($elemento->getOficio())) {
                            $hint .= '<p class="burbuja">'.$elemento->getOficio().'</p>';
                        }
                $hint .= '
                    </div>
                </div>';
                if(($cont % 4) == 3){ $hint .= '</div>'; }
                $cont += 1;
            }
        }
    }
    echo $hint === "" ? "<h2>No hay usuarios con ese nombre...</h2>" : $hint;
?>
