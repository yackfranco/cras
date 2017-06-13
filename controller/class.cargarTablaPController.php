<?php

class cargarTablaP extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablePersonal();


      $personalDAO = new personalDAO($this->getConfig()); 
      $respuesta1 = $personalDAO->select();
      $respuesta2 = array(
          'codigo' => (count($respuesta1) > 0) ? 200 : 500,
          'personal' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }
  private function loadTablePersonal() {
    require $this->getConfig()->getPath() . 'model/table/table.personal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.personal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.personalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.personalDAOExt.php';
  }

}
