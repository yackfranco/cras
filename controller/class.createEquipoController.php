<?php

class createEquipo extends controllerExtended {

  public function main(\request $request) {
    try {

//      print_r($request);
//      exit();

      $this->loadTablePersonal();


      $cesEquipo = new registroEquipoDAOExt($this->getConfig());
      $tablaCesEquipo = new registroEquipo();
      $equipoDAO = new equipoDAOExt($this->getConfig());
      $equipo = new equipo();

      $equipo->setTipo($request->getParam('tipo'));
      $equipo->setCodBarras($request->getParam('codbarra'));
      $equipo->setSerial($request->getParam('serial'));
      $equipo->setMarca($request->getParam('marca'));
      $equipo->setObservaciones($request->getParam('observaciones'));


      $equipoDAO->insert($equipo);
      $idInsertado = $equipoDAO->traerUltimoRegistro();
      
//      exit();
      //aqui voy
      $tablaCesEquipo->setEquiId($idInsertado[0]->max);
      $tablaCesEquipo->setRegPerId($request->getParam('regPerId'));
      $tablaCesEquipo->setPer_id($request->getParam('idPersona'));
      
      $regEntrada = $cesEquipo->insert($tablaCesEquipo);
      $answer = array(
          'code' => ($regEntrada > 0) ? 200 : 500,
          'answer' => $regEntrada
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

    require $this->getConfig()->getPath() . 'model/table/table.registroEquipo.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.registroEquipo.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.registroEquipoDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.registroEquipoDAOExt.php';
  }

}
