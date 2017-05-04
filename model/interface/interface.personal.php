<?php

/**
 * Interface para la tabla personal
 */
interface IPersonal {

  /**
   *  Metodo para seleccionar todos los datos de la tabla
   */
  public function select();

  /**
   *  Metodo para seleccionar un Registro buscado por el id
   * @param integer $id
   */
  public function selectById(integer $id);

  /**
   *  Metodo para insertar la persona en la BD
   * @param personal $personal
   */
  public function insert(personal $personal);

  /**
   * Metodo para actualizar un registro por el id
   * @param personal $personal
   */
  public function update(personal $personal);

  /**
   * Método para el borrado lógico o físico de un registro.
   * @param integer $id
   * @param boolean $logico
   */
  public function delete(integer $id, boolean $logico = true);
}
