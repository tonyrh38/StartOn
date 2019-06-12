
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
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
  xhttp.open("GET", "ordenacionListaEmpresa.php?q="+str, true);
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
        xmlhttp.open("GET", "filtrarListaEmpresa.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<body>
    <?php require("common/header.php")?>
    <div class="row" style="margin-top:70px;">
      <!-- poner aqui el ranking card
        echo '<div class="rankingcard">';
          aqui los elementos
        </div>
    -->

	<div id="container">

    <div class="row">

    <?php
        $SA = SA_Empresa::getInstance();
        $listPorLikes = $SA->getTopTres();
        $cont = 0;
        $rank = 1;

        echo '<div class="rankingcard">';
        while($cont < 3){
          $id =  $listPorLikes[$cont]->getId_Empresa();
          $nombre = $listPorLikes[$cont]->getNombre();
          $localizacion =  $listPorLikes[$cont]->getLocalizacion();
          $img = $listPorLikes[$cont]->getImagenPerfil();

          echo '<div id= "card">' .$rank.'º';     //hay que hacer el css card en comon para la lista
						echo '<a href ="perfEmp.php?id='.$id.'" ><img src= "../'.$img.'"></a>';
						echo ' <p class="burbuja" id="btitulo"> '. $nombre. '</p>';
						echo '<p class="burbuja"> '. $localizacion. '</p>';
					echo'</div>';

          $cont = $cont +1;
          $rank = $rank +1;
        }
        echo '</div>';
     ?>
     </div>

     <p><a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Sector')" >Sector</a>
     <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Localizacion')" >Localizacion</a>
     <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Oficio')" >Oficio</a><p>
     <p><input type="text" placeholder="Busca una empresa" class="busqueda" onkeyup="showSugerencia(this.value)"></p>
   </div>

</div>
		<div id="container2">
			<?php
				$SA = SA_Empresa::getInstance();
				$ListOfEmp = $SA->getAllElements();
        $cont = 0;
				foreach($ListOfEmp as $value){
          if(($cont % 4) == 0){
              echo '<div class = "row">';
          }
					echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
						echo '<a href ="perfEmp.php?id='.$value->getId_Empresa().'" ><img src= "../'.$value->getImagenPerfil().'"  style="width:100%"></a>';
						echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
						echo '<p class="burbuja"> '. $value->getFase(). '</p>';
						echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
						echo '<p class="burbuja" id="btexto"> '. $value->getCartaPresentacion(). '</p>';
					echo'</div>';
          if(($cont % 4) == 3){
              echo '</div>';
          }
          $cont += 1;
				}
			?>
		</div>
  		<?php require("common/footer.php")?>
</body>
