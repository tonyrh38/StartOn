<?php
require_once __DIR__.'/../includes/config.php';

if(isset($_GET["id"])){
	$SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
	$usr = $SA->getElement($_GET["id"]);
	if($usr != null && $usr->getCurriculum() != null){
		header("Content-disposition: attachment; filename=curriculum.pdf");
		header("Content-type: application/pdf");
		readfile("../".$usr->getCurriculum());
	}
	else{
		header("Location: perfUser.php?id=".$_GET["id"]);
	}
}
else{
	header("Location: perfUser.php?id=".$_GET["id"]);
}
?>