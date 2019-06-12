<?php
class transferLike {

	private $id_empresa;
  private $id_usuario;

	function __construct($id_empresa,$id_usuario){
		$this->id_empresa = $id_empresa;
		$this->id_usuario = $id_usuario;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return $id_empresa: string value*/
	public function getId_Empresa() {
		return $this->id_empresa;
	}

  public function getId_Usuario(){
    return $this->id_usuario;
  }


/**SETTER: cambian los valores */

		/** set @param id_empresa : string value */
	public function setId_Empresa($id_empresa){
		$this->id_empresa = $id_empresa;
	}

		/** set @param nombre : string value */
	public function setId_Usuario($id_usuario){
		$this->id_usuario = $id_usuario;

	}
}
?>
