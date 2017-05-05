<?php
/**
 * Manager Class de los metodos que extienden de la tabla rol
 */
class rolDAOExt extends rolDAO {
/**
 * 
 * @param type $persona
 * @return type
 */
  public function search($persona) {
    $sql = 'SELECT id, tipo_persona FROM ces_tipo_persona WHERE tipo_persona = :tPersona';
    $params = array(
        ':tPersona' => $persona
    );
    return $this->query($sql, $params);
  }

}
