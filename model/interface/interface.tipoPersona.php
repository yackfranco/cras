<?php
/**
 * Interface para la tabla tipo persona
 */
interface ItipoPersona {
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
 * Metodo para insertar el tipo de persona en la BD
 * @param tipoPersona $persona
 */
  public function insert(tipoPersona $persona);
/**
 * Metodo para actualizar un registro por el id
 * @param tipoPersona $persona
 */
  public function update(tipoPersona $persona);
/**
 * Método para el borrado lógico o físico de un registro.
 * @param type integer $id
 */
  public function delete($id);
}
