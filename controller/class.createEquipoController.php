<?php

class createEquipo extends controllerExtended {

  public function main(\request $request) {
    try { 
    $this->loadTablePersonal();

    $equipo = new equipo();
    $equipo->setTipo($request->getParam('tipo'));
    $equipo->setCodBarras($request->getParam('codbarra'));
    $equipo->setSerial($request->getParam('serial'));
    $equipo->setMarca($request->getParam('marca'));
    $equipo->setObservaciones($request->getParam('observaciones'));

    $equipoDAO = new equipoDAOExt($this->getConfig());
    $row = $equipoDAO->insert($equipo);

    $answer = array(
        'code' => ($row > 0) ? 200 : 500,
        'answer' => $row
    );

    $this->setParam('rsp', $answer);
    $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTablePersonal() {
    require $this->getConfig()->getPath() . 'model/table/table.equipo.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.equipo.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.equipoDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.equipoDAOExt.php';
  }

}
