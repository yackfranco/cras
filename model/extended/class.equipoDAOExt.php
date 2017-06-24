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

    $sql = 'select ces_equipo.equi_id, ces_equipo.equi_tipo,ces_equipo.equi_serial,ces_equipo.equi_marca,ces_equipo.equi_observacion '
            . 'from ces_equipo'
            . ' inner join ces_registro_equipo on ces_equipo.equi_id = ces_registro_equipo.equi_id'
            . ' where fecha_entrada is not null and fecha_salida is not null'
            . ' and ces_registro_equipo.equi_id not in (select equi_id'
            . ' from ces_registro_equipo'
            . ' where fecha_salida is null) AND ces_equipo.equi_serial = :serial group by ces_equipo.equi_id';
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
