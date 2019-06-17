<?php
require_once("../includes/config.php");

    interface SA_Interface {

    	public function getAllElements();
    	public function getElement($id);
    	public function createElement($transfer);
    	public function updateElement($transfer);
    	public function deleteElement($id);
    	public function elementRelation($transfer);//TO DO --> Interaccion, apunta a evento, crea evento
    	public function login($transfer); //Parsea los datos enviados por el transfer y si es conveniente crea un elemento

   }
?>
