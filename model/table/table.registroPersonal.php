<?php

/**
 * Manager Class de la tabla registro del personal
 */
class registroPersonal {

  /**
   * Llave Foranea,Principal y campo autoincrementable de la tabla Personal.
   * @var Integer  
   */
  private $perId;

  /**
   * Llave Principal y campo autoincrementable de la tabla Registro del Personal
   * @var Integer 
   */
  private $id;

  /**
   * Registro de entrada segun la fecha y hora del momento.
   * @var string 
   */
  private $entrada;

  /**
   * Registro de salida segun la fecha y hora del momento.
   * @var string 
   */
  private $salida;

  /**
   * Obtiene el ID del registro
   * @return Integer
   */
  public function getPerId() {
    return $this->perId;
  }

  /**
   * Obtiene el ID del registro del personal.
   * @return Integer
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Obtiene el registro de entrada del personal.
   * @return string
   */
  public function getEntrada() {
    return $this->entrada;
  }

  /**
   * Obtiene el registro de salida del personal.
   * @return string
   */
  public function getSalida() {
    return $this->salida;
  }

  /**
   * Setea el ID del registro
   * @param type $perId
   */
  public function setPerId($perId) {
    $this->perId = $perId;
  }

  /**
   * Setea el ID del registro del personal 
   * @param type $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * Setea el registro de entrada del personal
   * @param string $entrada
   */
  public function setEntrada($entrada) {
    $this->entrada = $entrada;
  }

  /**
   * Setea el registro de entrada del personal
   * @param string $salida
   */
  public function setSalida($salida) {
    $this->salida = $salida;
  }

}
