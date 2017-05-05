<?php
/**
 * Manager Class de los metodos principales de la tabla rol
 */
class rolDAO extends dataSource implements IRol{
    
/**
 * metodo para el borrado logico o fisico de un rol
 * @param type integer $id
 * @return  integer
 */
  public function delete($id) {
    $sql = 'DELETE FROM ces_rol WHERE rol_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }
/**
 * metodo para insertar el equipo en la tabla de la BD
 * @param \rol $rol
 * @return integer
 */
  public function insert(\rol $rol) {
    $sql = 'INSERT INTO ces_rol (rol_nombre) VALUES (:nombre)';
    $params = array(
        ':nombre' => $rol->getNombre(),
    );
    return $this->execute($sql, $params);
  }
/**
 * metodo para seleccionar el equipo en la tabla de la BD
 * @return of stdClass
 */
  public function select() {
    $sql = 'SELECT rol_id, rol_nombre FROM ces_rol';
    return $this->query($sql);
  }
/**
 * metodo para seleccionar un equipo en especifico
 * @param integer $id
 * @return of stdClass
 */
  public function selectById($id) {
    $sql = 'SELECT rol_nombre FROM ces_rol WHERE rol_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }
/**
 * metodo para actualizar un registro en la BD
 * @param \rol $rol
 * @return integer
 */
  public function update(\rol $rol) {
    $sql = 'UPDATE ces_rol SET rol_nombre= :nombre WHERE rol_id = :id';
    $params = array(
        ':nombre' => $rol->getNombre(),
        ':id' => $rol->getId()
    );
    return $this->execute($sql, $params);
  }

}


