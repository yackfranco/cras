<?php
/**
 * Manager Class de los metodos principales de la tabla tipo Persona
 */
class tipoPersonaDAO extends dataSource  implements ItipoPersona {
/**
 * metodo para el borrado logico o fisico de un tipo Persona
 * @param  integer $id
 * @return integer
 */
  public function delete($id) {
    $sql = 'DELETE FROM ces_tipo_persona WHERE id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }
/**
 * metodo para insertar el equipo en la tabla de la BD
 * @param \tipoPersona $persona
 * @return integer
 */
  public function insert(\tipoPersona $persona) {
    $sql = 'INSERT INTO ces_tipo_persona (tipo_persona) VALUES (:tPersona)';
    $params = array(
        ':tPersona' => $persona->getTipoPersona()
    );
    return $this->execute($sql, $params);
  }
/**
 * metodo para seleccionar todos los datos de la BD
 * @return array of stdClass
 */
  public function select() {
    $sql = 'SELECT id, tipo_persona FROM ces_tipo_persona';
    return $this->query($sql);
  }
/**
 * metodo para seleccionar un equipo en especifico
 * @param type integer
 * @return array of stdClass
 */
  public function selectById($id) {
    $sql = 'SELECT tipo_persona FROM ces_tipo_persona WHERE id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }
/**
 * metodo para actualizar un registro en la BD
 * @param \tipoPersona $persona
 * @return integer
 */
 public function update(\tipoPersona $persona) {
    $sql = 'UPDATE ces_tipo_persona SET tipo_persona = :tPersona WHERE id = :id';
    $params = array(
        ':tPersona' => $persona>getTipoPersona(),
        ':id' => $persona->getId()
    );
    return $this->execute($sql, $params);
  }

}

