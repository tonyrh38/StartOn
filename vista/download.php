<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");

if(isset($_GET["id"])){
	$SA = SA_Usuario::getInstance();
	$usr = $SA->getElement($_GET["id"]);
	if($usr != null && $usr->getCurriculum() != null){
		header("Content-disposition: attachment; filename=curriculum.pdf");
		header("Content-type: application/pdf");
		readfile("../pdf/curr".$_GET['id'].".pdf");
	}
	else{
		header("Location: perfUser.php?id=".$_GET["id"]);
	}
}
else{
	header("Location: perfUser.php?id=".$_GET["id"]);
}
?>