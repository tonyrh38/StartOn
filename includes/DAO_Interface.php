<?php

require_once("../includes/config.php");

  interface DAO_Interface
  {
    public function getAllElements();
    public function getElementById($id);
    public function getElementByEmail($gmail);
    public function updateElement($id, $campo, $nuevoValor);
    public function deleteElement($id);
    public function createElement($transfer);
  }
?>
