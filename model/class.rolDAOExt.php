<?php
/**
 * Manager Class de los metodos que extienden de la tabla tipoPersona
 */
class rolDAOExt extends rolDAO {
/**
 * 
 * @param type 
 * @return type
 */
  public function search($nombre) {
    $sql = 'SELECT rol_id, rol_nombre FROM ces_rol WHERE rol_nombre = :nombre';
    $params = array(
        ':nombre' => $nombre
    );
    return $this->query($sql, $params);
  }

}
