<?php

/**
 * Manage class de los metodos principales de la tabla resgistro del personal
 */
class registroPersonalDAO extends dataSource implements IregistroPersonal {

  /**
   * Mètodo para el borrado de un registro.
   * @param Integer $id
   * @return Integer
   */
  public function delete($id) {
    $sql = 'DELETE FROM ces_registro_personal WHERE reg_per_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para insertar el registro de una persona en la BD.
   * @param \registroPersonal $rePersonal
   * @return Integer
   */
  public function insert($id) {
    $sql = 'INSERT INTO ces_registro_personal (per_id,reg_per_entrada) VALUES (:id,now())';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para seleccionar todos los registros de la tabla.
   * @return array of stdClass
   */
  public function select() {
    $sql = 'SELECT reg_per_id, per_id, reg_per_entrada, reg_per_salida FROM ces_registro_personal';
    return $this->query($sql);
  }

  /**
   * Metodo para seleccionar un registro que se busca por id.
   * @param Integer $id
   * @return array of stdClass
   */
  public function selectById($id) {

    $sql = 'SELECT reg_per_id FROM ces_registro_personal WHERE reg_per_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  /**
   * Metodo para actualizar un registro de entrada y salida por id.
   * @param \registroPersonal $rePersonal
   * @return Integer
   */
  public function update($id) {

    $sql = 'UPDATE ces_registro_personal SET reg_per_salida = now() WHERE reg_per_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

}
