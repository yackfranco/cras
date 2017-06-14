<?php

/**
 * Manager Class de la tabla personal
 */
class personal {

  /**
   * Llave Principal y campo autoincrementable de la tabla Personal
   * @var integer
   */
  private $id;

  /**
   * Numero de Identificacion del Personal (C.C / T.I)
   * @var string
   */
  private $identificacion;
  private $identificacionAprendiz;
  private $idTipoPersona;
  private $foto;
  private $nombre;
  private $apellidos;
  private $genero;
  private $ficha;
  private $celFamiliar;

  private $create_at;
  private $update_at;
  private $delete_at;

  /**
   * Obtiene el ID del registro
   * @return Integer
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Obtiene la identificacion de la persona 
   * @return string
   */

  public function getIdentificacion() {
    return $this->identificacion;
  }

  /**
   * Obtiene el NIS  del Aprendiz
   * @return integer
   */
  public function getIdentificacionAprendiz() {
    return $this->identificacionAprendiz;
  }

  /**
   * Obtiene el tipo de Persona el cual se registra
   * @return integer
   */
  public function getIdTipoPersona() {
    return $this->idTipoPersona;
  }

  /**
   * Obtiene la foto de la persona
   * @return string
   */
  public function getFoto() {
    return $this->foto;
  }

  /**
   * Obtiene el nombre de la persona
   * @return string
   */
  public function getNombre() {
    return $this->nombre;
  }

  /**
   * Obtiene el apellido de la persona
   * @return string
   */
  public function getApellidos() {
    return $this->apellidos;
  }

  /**
   * Obtiene un booleano (true=Femenino; false=Masculino )
   * @return boolean
   */
  public function getGenero() {
    return $this->genero;
  }

  /**
   * Obtiene la ficha de formacion a quien pertenece el estudiante
   * @return string
   */
  public function getFicha() {
    return $this->ficha;
  }

  /**
   * Obtiene el numero de celular de un familiar de la persona
   * @return string
   */
  public function getCelFamiliar() {
    return $this->celFamiliar;
  }

  /**
   * Obtiene la fecha de cuando se creo el registro
   * @return string 
   */
  public function getCreateAt() {
    return $this->create_at;
  }

  /**
   * Obtiene la fecha de cuando se actualizo el registro
   * @return string
   */
  public function getUpdateAt() {
    return $this->update_at;
  }

  /**
   * Obtiene la fecha de cuando se elimino el registro
   * @return string
   */
  public function getDeleteAt() {
    return $this->delete_at;
  }

  /**
   * Setea el ID del registro
   * @param Integer $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * Setea el numero de informacion de la persona
   * @param string
   */
  public function setIdentificacion($identificacion) {
    $this->identificacion = $identificacion;
  }

  /**
   * Setea el numero del NIS del aprendiz
   * @param integer
   */
  public function setIdentificacionAprendiz($identificacionAprendiz) {
    $this->identificacionAprendiz = $identificacionAprendiz;
  }

  /**
   * Setea numero del tipo de Persona el cual se registra
   * @param Integer
   */
  public function setIdTipoPersona($idTipoPersona) {
    $this->idTipoPersona = $idTipoPersona;
  }

  /**
   * Setea la direccion fisica de donde se encuentra la foto de la persona
   * @param string
   */
  public function setFoto($foto) {
    $this->foto = $foto;
  }

  /**
   * Setea el nombre de la persona
   * @param string
   */
  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Setea el apellido de la persona
   * @param string
   */
  public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
  }

  /**
   * Setea un booleano (true=Femenino; false=Masculino )
   * @param boolean
   */
  public function setGenero($genero) {
    $this->genero = $genero;
  }

  /**
   * Setea el numero de la ficha de la formacion de donde pertenese la persona
   * @param string
   */
  public function setFicha($ficha) {
    $this->ficha = $ficha;
  }

  /**
   * Setea el numero del telefono de un familiar de la persona
   * @param string
   */
  public function setCelFamiliar($celFamiliar) {
    $this->celFamiliar = $celFamiliar;
  }

  /**
   * Setea la fecha de cuando se crea(en el momento) el registro
   * @param string
   */
  public function setCreateAt($create_at) {
    $this->create_at = $create_at;
  }

  /**
   * Setea la fecha del momento de actualizar el registro
   * @param string
   */
  public function setUpdateAt($update_at) {
    $this->update_at = $update_at;
  }

  /**
   * Setea la fecha del momento cuando se elimina el registro
   * @param string
   */
  public function setDeleteAt($delete_at) {
    $this->delete_at = $delete_at;
  }

}
