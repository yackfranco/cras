<?php

/**
 * Inteface para la tabla registro equipos
 */
interface IregistroEquipo {
  /**
   * Metodo para seleccionar todos los datos de la tabla 
   */
  public function select();

  /**
   * Metodo para seleccionar un registro del equipo por id
   * @param type $id
   */
  public function selectById($id);

  /**
   * Metodo para insertar el registro de un equipo
   * @param registroEquipo $reEquipo
   */
  public function insert(registroEquipo $reEquipo);

  /**
   * Metodo para actualizar un registro por id
   * @param registroEquipo $reEquipo
   */
  public function update($id);

  /**
   * Metodo para borrar un registro equipo por id
   * @param type $id
   */
  public function delete($id);
}
