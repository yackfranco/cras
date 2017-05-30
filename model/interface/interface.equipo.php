<?php

/**
 * Interface para la tabla equipo
 */
interface IEquipo {

  /**
   * metodo para seleccionar todos los registros de la tabla
   */
  public function select();
  
  /**
   * metodo para seleccionar un registro especifico de la BD
   * @param integer $id
   */
  public function selectById(integer $id);
          
  /**
   * metodo para insertar un equipo en la BD
   * @param equipo $equipo
   */
  public function insert(equipo $equipo);
  
  /**
   * metodo para actualizar un registro por ID en la BD
   * @param equipo $equipo
   */
  public function update(equipo $equipo);
  
  /**
   * metodo para el borrado fisico o logico de un registro en la BD
   * @param integer $id
   * @param boolean $logico
   */
  public function delete(integer $id, boolean $logico);
}
