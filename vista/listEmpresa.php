<?php
require_once __DIR__.'/../includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/css.css">
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
	<div id="container">
    <div class="row">
        <div class="titulo">Conoce nuevas empresas</div>
    </div>
    <div class="row">
      <input class="busqueda" type="text" placeholder="Busca una empresa determinada..." onkeyup="showSugerencia(this.value)">
    </div>
    <div class="row">
      <p><b>Filtra por:</b> 
        <a class ="botonGuay" onclick="showListaOrdenada('Sector')" >Sector</a>
        <a class ="botonGuay" onclick="showListaOrdenada('Localizacion')" >Localización</a>
        <a class ="botonGuay" onclick="showListaOrdenada('Oficio')" >Oficio</a>
      <p>
    </div>    
  </div>
	<div id="container2">
		<?php
			$SA = es\ucm\fdi\aw\SA_Empresa::getInstance();
			$ListOfEmp = $SA->getAllElements();
      $cont = 0;
			foreach($ListOfEmp as $value){
        if(($cont % 4) == 0){ echo '<div class = "row">'; }
				echo '
        <div class="half-column">
          <div id= "card">
  				  <a href ="perfEmp.php?id='.$value->getId_Empresa().'">
            <img src= "../'.$value->getImagenPerfil().'"></a>
  				  <p class="burbuja" id="btitulo">'.$value->getNombre().'</p>';
            if (!empty($value->getFase())) {
              echo '<p class="burbuja">'.$value->getFase().'</p>';
            }
  					if (!empty($value->getLocalizacion())) {
              echo '<p class="burbuja">'.$value->getLocalizacion().'</p>';
            }
  					if (!empty($value->getOficio())) {
            echo '<p class="burbuja">'.$value->getOficio().'</p>';
            }
  				echo'</div>';
        echo "</div>";
        if(($cont % 4) == 3){ echo '</div>'; }
        $cont += 1;
			}
		?>
	</div>
  <?php require("common/footer.php")?>
</body>
