<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<script>
function showListaOrdenada(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("container2").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("container2").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ordenacionListaUsuarios.php?q="+str, true);
  xhttp.send();
}

function showSugerencia(str) {
    if (str.length == 0) {
        document.getElementById("container2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("container2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "filtrarListaUsuarios.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<body>
    <?php require("common/header.php")?>
    <div class = container>
        <div class="row" style="margin-top:70px;">
          <?php
          $SA = SA_Usuario::getInstance();
  				$ListOfUser = $SA->getAllElements();
          shuffle($ListOfUser);
          $i = 0;
          $size = sizeof($ListOfUser) / 2;
            echo '<div class="rankingcard"><p style="font-weight:bold; margin-bottom:-10; margin-top:-10;">CONOCE USUARIOS!</p>';
            while($i < $size) {
              $value = $ListOfUser[$i];
                echo '<a href ="perfUser.php?id='.$value->getId_Usuario().'"';
                echo '><img id ="imagenCuadro" src= "../'.$value->getImagenPerfil().'"></a>';
              $i+=1;
            }
            echo '<p><input type="text" placeholder="O busca uno por su nombre" class="busqueda" onkeyup="showSugerencia(this.value)"></p></div>';
        ?>
        </div>
        <div class = "row" style="margin-top: 10px;" >
        <p><a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Oficio')" >Oficio</a>
        <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Localizacion')" >Localizacion</a></p>
      </div>
  </div>
	<div id="container2">
	<?php
				$SA = SA_Usuario::getInstance();
				$ListOfUser = $SA->getAllElements();
        $cont = 0;
				foreach($ListOfUser as $value){
					/*
					echo '<pre>';
					var_dump($value->getImagenPerfil());
					echo '</pre>';
					*/
          if(($cont % 4) == 0){
              echo '<div class = "row">';
          }
          echo '<div id= "card">';
            echo '<a href ="perfUser.php?id='.$value->getId_Usuario().'"';
            echo '><img src= "../'.$value->getImagenPerfil().'"  style="width:100%"></a>';
						echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre() .' '. $value->getApellido(). '</p>';
						echo '<p class="burbuja"> '. $value->getOficio(). '</p>';
						echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
					echo'</div>';
          if(($cont % 4) == 3){
            	echo '</div>';
          }
          $cont += 1;
        }
			?>
		</div>
		<?php require("common/footer.php")?>
	</div>
</body>
