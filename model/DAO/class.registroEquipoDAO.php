<?php

/**
 * Manage class de los metodos principales de la tabla Registro Equipo
 */
class registroEquipoDAO extends dataSource implements IregistroEquipo {

  /**
   * Metodo para el borrado de un equipo
   * @param Interger $id
   * @return Interger
   */
  public function delete($id) {
    $sql = 'DELETE FROM ces_registro_equipo WHERE reg_equi_id =:id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para insertar el registro del equipo en la BD
   * @param \registroEquipo $reEquipo
   * @return Integer
   */
  public function insert(\registroEquipo $reEquipo) {
    $sql = 'INSERT INTO ces_registro_equipo (equi_id,reg_per_id,fecha_entrada) VALUES (:id,:reg_per_id,now()) ';
    $params = array(
        ':id'=>$reEquipo->getEquiId(),
        ':reg_per_id'=>$reEquipo->getRegPerId()
        
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para seleccionar todos los registro  de la tabla registro equipo
   * @return array of stdClass
   */
  public function select() {
    $sql = 'SELECT reg_equi_id, equi_id, reg_per_id FROM ces_registro_equipo  ';
    return $this->query($sql);
  }

  /**
   * Metodo para seleccionar un equipo buscando por el id.
   * @param Integer $id
   * @return array of stdClass
   */
  public function selectById($id) {
    $sql = 'SELECT reg_equi_id FROM ces_registro_equipo WHERE reg_equi_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  /**
   * Metodo para actualizar un registro de la entrada y salida del equipo
   * @param \registroEquipo $reEquipo
   * @return Integer
   */
  public function update(\registroEquipo $reEquipo) {
    $sql = 'UPDATE ces_registro_equipo SET fecha_entrada = :entrada, fecha_salida = :salida WHERE reg_equi_id = :id';
    $params = array(
        ':entrada' => $reEquipo->getEntrada(),
        ':salida' => $reEquipo->getSalida(),
    );
    return $this->execute($sql, $params);
  }

}
