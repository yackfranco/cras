<?php

/**
 * Manager class de la tabla registro equipo
 */
class registroEquipo {

  /**
   * Llave Principal y campo autoincrementable de la tabla RegistroP
   * @var Integer
   */
  private $id;

  /**
   * Llave Foranea de la tabla Equipos
   * @var integer
   */
  private $equiId;

  /**
   * llave foranea del ID de la tabla registro Personal
   * @var Integer
   */
  private $regPerId;

  /**
   * Registro de entrada segun la fecha y hora del momento
   * @var string
   */
  private $entrada;

  /**
   * Registro de salida seguin la fecha y hora del momento
   * @var string
   */
  private $salida;

  /**
   * Obtiene el ID del registro de Equipo
   * @return Integer
   */
  function getId() {
    return $this->id;
  }

  /**
   * Obtiene el ID de la tabla Equipo
   * @return Integer
   */
  function getEquiId() {
    return $this->equiId;
  }

  /**
   * Obtiene el ID de la tabla Registro Personal
   * @return Integer
   */
  function getRegPerId() {
    return $this->regPerId;
  }

  /**
   * Obtiene el registro de entrada del registro equipo
   * @return  string
   */
  function getEntrada() {
    return $this->entrada;
  }

  /**
   * Obtiene el registro de salida del registro equipo
   * @return string
   */
  function getSalida() {
    return $this->salida;
  }

  /**
   * Setea el Id del Equipo
   * @param type $id
   */
  function setId($id) {
    $this->id = $id;
  }

  /**
   * Setea el ID de la tabla Equipo
   * @param type $equiId
   */
  function setEquiId($equiId) {
    $this->equiId = $equiId;
  }

  /**
   * Setea el ID de la tabla registro personal
   * @param type $regPerId
   */
  function setRegPerId($regPerId) {
    $this->regPerId = $regPerId;
  }

  /**
   *  Setea el registro de entrada del registro equipo
   * @param type $entrada
   */
  function setEntrada($entrada) {
    $this->entrada = $entrada;
  }

  /**
   *  Setea el registro de salida del registro equipo
   * @param type $salida
   */
  function setSalida($salida) {
    $this->salida = $salida;
  }

}
