<?php
require_once __DIR__.'/../includes/config.php';

if(isset($_SESSION['login'])){
 		if(isset($_SESSION['id_usuario'])){
 			$id= $_SESSION['id_usuario'];
 			$SA= es\ucm\fdi\aw\SA_Usuario::getInstance();
 		}else{
 			$id= $_SESSION['id_empresa'];
 			$SA= es\ucm\fdi\aw\SA_Empresa::getInstance();
 		}
 	}

 	$dir= $SA->deleteElement($id);
 	if($dir !== "Error"){
 		header('Location: '.$dir);
 	}else{
 		header('Location: ../index.php');
 	}
  ?>
