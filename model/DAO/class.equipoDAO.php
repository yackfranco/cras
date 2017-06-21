<?php

/**
 * Manager Class de los metodos principales de la tabla equipos
 */
class equipoDAO extends dataSource implements IEquipo {

  /**
   * metodo para el borrado logico o fisico de un equipo
   * @param Integer $id
   * @param Boolean $logico
   * @return Integer
   */
  public function delete(integer $id, boolean $logico) {
    if ($logico) {
      $sql = 'UPDATE FROM equipo SET equi_delete_at = now() WHERE equi_id = :id';
    } else {
      $sql = 'DELETE FROM equipo WHERE id = :id';
    }
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  /**
   * metodo para insertar el equipo en la tabla de la BD
   * @param \equipo $equipo
   * @return Integer
   */
  public function insert(\equipo $equipo) {
    try {
      $sql = 'INSERT INTO ces_equipo (equi_tipo,equi_serial,equi_marca,'
              . 'equi_codbarras,equi_observacion,equi_create_at) VALUES (:tipo,:serial,'
              . ':marca,:codbarras,:observaciones,now())';
      $params = array(
          ':tipo' => (string) $equipo->getTipo(),
          ':serial' => (string) $equipo->getSerial(),
          ':marca' => (string) $equipo->getMarca(),
          ':codbarras' => (string) $equipo->getCodBarras(),
          ':observaciones' => (string) $equipo->getSerial(),
      );
      return $this->execute($sql, $params);
    } catch (Exception $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

  /**
   * metodo para seleccionar todos los datos de la BD
   * @return array of stdClass
   */
  public function select() {
    $sql = 'SELECT equi_id,equi_tipo,equi_serial,equi_marca,'
            . 'equi_codbarras,equi_observaciones FROM ces_equipo';
    return $this->query($sql);
  }

  /**
   * metodo para seleccionar un equipo en especifico
   * @param integer $id
   * @return array of stdClass
   */
  public function selectById($id) {
    $sql = 'SELECT equi_id,equi_tipo,equi_serial,equi_marca,'
            . 'equi_codbarras,equi_observaciones FROM ces_equipo WHERE equi_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  /**
   * metodo para actualizar un registro en la BD
   * @param \equipo $equipo
   * @return Integer
   */
  public function update(\equipo $equipo) {
    $sql = 'UPDATE ces_equipo SET equi_tipo=:tipo, equi_serial=:serial, equi_marca=:marca,'
            . 'equi_codbarras=:codbarras,equi_observaciones=:observaciones WHERE equi_id = :id';
    $params = array(
        ':id' => $equipo->getId(),
        ':tipo' => $equipo->getTipo(),
        ':serial' => $equipo->getSerial(),
        ':marca' => $equipo->getMarca(),
        ':codbarras' => $equipo->getCodBarras(),
        ':observaciones' => $equipo->getSerial(),
    );
    return $this->execute($sql, $params);
  }

}
