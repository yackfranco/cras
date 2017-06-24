<?php

class equipoDAOExt extends equipoDAO {

  public function search($serial) {
    $sql = 'SELECT equi_id,equi_tipo,equi_serial,equi_marca,equi_codbarras,equi_observacion FROM ces_equipo WHERE equi_serial = :serial';
    $params = array(
        ':serial' => $serial
    );
    return $this->query($sql, $params);
  }

  public function consultaEntradaEquipo($serial) {
    $sql = 'SELECT e.equi_id, e.equi_tipo,e.equi_serial,e.equi_marca,e.equi_observacion from ces_equipo as e inner join '
            . 'ces_registro_equipo as r on e.equi_id = r.equi_id WHERE'
            . '(r.fecha_entrada IS NOT NULL AND r.fecha_salida IS NOT NULL) AND'
            . ' e.equi_serial = :serial';
    $params = array(
        ':serial' => $serial
    );
    return $this->query($sql, $params);
  }

  
   public function traerUltimoRegistro() {
    $sql = 'select max(equi_id) from ces_equipo ';
    $params = array(
        
    );
    return $this->query($sql, $params);
  }
}
