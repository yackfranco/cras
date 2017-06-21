<?php

class cesPc extends controllerExtended {

  public function main(\request $request) {

//    print_r($request);
//    exit();

    $this->loadTable();

    $consultaPc = new equipoDAOExt($this->getConfig());
    $consultaRegPc = new registroEquipoDAOExt($this->getConfig());
    $RegEquipo = new registroEquipo();
    $row = $consultaPc->search($request->getParam('serial'));
//    print_r($row[0]->equi_id);
//    exit();  
    if (count($row) > 0) {
      $RegEquipo->setRegPerId($request->getParam('idPersona'));
      $RegEquipo->setEquiId($row[0]->equi_id);
      $consultaRegPc->insert($RegEquipo);
      $select = $consultaRegPc->select();

      $answer = array(
          'accion' => 'equipoEntra',
          'persona' => $select
      );
    }


//    print_r($row);
//    exit();









    $this->setParam('rsp', $answer);
    $this->setView('imprimirJson');
  }

  private function loadTable() {
    require $this->getConfig()->getPath() . 'model/table/table.equipo.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.equipo.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.equipoDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.equipoDAOExt.php';
    require $this->getConfig()->getPath() . 'model/table/table.registroEquipo.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.registroEquipo.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.registroEquipoDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.registroEquipoDAOExt.php';
  }

}
