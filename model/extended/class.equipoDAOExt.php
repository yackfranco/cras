<?php

class equipoDAOExt extends equipoDAO {

  public function search($serial) {
    $sql =  'SELECT equi_id,equi_tipo,equi_serial,equi_marca,equi_codbarras,equi_observacion FROM ces_equipo WHERE equi_serial = :serial';
    $params = array(
        ':serial' => $serial
    );
    return $this->query($sql, $params);
  }
}
