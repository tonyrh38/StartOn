<?php
class TransferUsuario {

	private $id_usuario;
	private $nombre;
	private $apellido;
	private $password;
	private $email;
	private $localizacion;
	private $experiencia;
	private $pasiones;
	private $cartaPresentacion;
	private $imagenPerfil;
	private $oficio;
	private $curriculum;


	function __construct($id_usuario, $nombre, $apellido, $password, $email,$localizacion, $experiencia, $pasiones, $cartaPresentacion,$imagenPerfil, $oficio,$curriculum){
		$this->id_usuario = $id_usuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->password = $password;
		$this->email = $email;
		$this->localizacion = $localizacion;
		$this->experiencia = $experiencia;
		$this->pasiones = $pasiones;
		$this->cartaPresentacion = $cartaPresentacion;
		$this->imagenPerfil = $imagenPerfil;
		$this->oficio = $oficio;
		$this->curriculum = $curriculum;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return oficio : string value*/
	public function getOficio(){
		return $this->oficio;
	}

	/**@return id_usuario : string value*/
	public function getId_Usuario(){
		return $this->id_usuario;
	}

	/**@return nombre: string value*/
	public function getNombre(){
		return $this->nombre;
	}

	/**@return apellido: string value*/
	public function getApellido(){
		return $this->apellido;
	}

	/**@return password: string value on hash*/
	public function getPassword(){
		return $this->password;
	}

	/**@return email: string value*/
	public function getEmail(){
		return $this->email;
	}

	/**@return localizacion: string value*/
	public function getLocalizacion(){
		return $this->localizacion;
	}

	/**@return experiencia: string value*/
	public function getExperiencia(){
		return $this->experiencia;
	}

	/**@return pasiones: string value*/
	public function getPasiones(){
		return $this->pasiones;
	}

	/**@return cartaPresentacion: string value*/
	public function getCartaPresentacion(){
		return $this->cartaPresentacion;
	}

	/**@return imagenPerfil: url value*/
	public function getImagenPerfil(){
		if($this->imagenPerfil==null)
			return 'img/usuario.png';
		else
			return $this->imagenPerfil;
	}
	/**@return curriculum: url value*/
	public function getCurriculum(){
		return $this->curriculum;
	}

	/**SETTER: cambian los valores */

		/** set @param id_usuario : string value */
	public function setId_Usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

		/** set @param nombre : string value */
	public function setOficio($oficio){
		$this->oficio = $oficio;
	}


		/** set @param nombre : string value */
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

		/** set @param apellido : string value */
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	/** set @param password : string value */
	public function setPassword($password){
		$this->password = $password;
	}

		/** set @param email : string value */
	public function setEmail($email){
		$this->email= $email;
	}

	/** set @param localizacion : string value */
	public function setLocalizacion($localizacion){
		$this->localizacion = $localizacion;
	}

		/**set @param experiencia : string value */
	public function setExperiencia($experiencia){
		$this->experiencia = $experiencia;
	}

	/**set  @param pasiones : string value */
	public function setPasiones($pasiones){
		$this->pasiones = $pasiones;
	}

		/**set @param cartaPresentacion : string value */
	public function setCartaPresentacion($cartaPresentacion){
		$this->cartaPresentacion = $cartaPresentacion;
	}

	/** set @param imagenPerfil : url value */
	public function setImagenPerfil($imagenPerfil){
		$this->imagenPerfil = $imagenPerfil;
	}
	/**set @param curriculum : url value */
	public function setCurriculum($curriculum){
		$this->curriculum = $curriculum;
	}
}
?>
