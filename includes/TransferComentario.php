<?php
namespace es\ucm\fdi\aw;

class TransferComentario{

	private $NombreEvento;
  	private $IdUsuario;
	private $Contenido;
	private $Titulo;

	function __construct($NombreEvento,$Id_Usuario,$Titulo, $Contenido){
		$this->NombreEvento = $NombreEvento;
		$this->Id_Usuario = $Id_Usuario;
		$this->Contenido = $Contenido;
		$this->Titulo = $Titulo;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return $id_empresa: string value*/
	public function getNombreEvento() {
		return $this->NombreEvento;
	}

  public function getId_Usuario(){
    return $this->Id_Usuario;
  }

	public function getContenido(){
		return $this->Contenido;
	}

	public function getTitulo(){
		return $this->Titulo;
	}


/**SETTER: cambian los valores */

		/** set @param NombreEvento : string value */
	public function setNombreEvento($NombreEvento){
		$this->NombreEvento = $NombreEvento;
	}

		/** set @param IdUsuario : string value */
	public function setId_Usuario($Id_Usuario){
		$this->Id_Usuario = $Id_Usuario;
	}
	public function setContenido($Contenido){
		$this->Contenido = $Contenido;
	}
	public function setTitulo($Titulo){
		$this->Titulo = $Titulo;
	}

}
?>
