<?php
/**
 * Interface para la tabla rol
 */
interface IRol {
/**
 * Metodo para seleccionar todos los datos de la tabla
 */
  public function select();
/**
 * Metodo para seleccionar un Registro buscado por el id
 * @param type integer $id
 */
  public function selectById($id);
/**
 * Metodo para insertar el rol en la BD
 * @param rol $rol
 */
  public function insert(rol $rol);
/**
 * Metodo para actualizar un registro por el id
 * @param rol $rol
 */
  public function update(rol $rol);
/**
 * Método para el borrado lógico o físico de un registro.
 * @param type integer $id
 */
  public function delete($id);
}
