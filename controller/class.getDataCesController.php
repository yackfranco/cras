<?php

class getDataCes extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTableUsuario();

      $identificacion = $request->getParam('identificacion');

      $personalDAO = new personalDAOExt($this->getConfig());
      $respuesta1 = $personalDAO->searchForIdentification($identificacion);
      $respuesta2 = array(
          'fecha' => date ("h:i:s"),
          'codigo' => (count($respuesta1) > 0) ? 200 : 500,
          'usuario' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTableUsuario() {
    require $this->getConfig()->getPath() . 'model/table/table.personal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.personal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.personalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.personalDAOExt.php';
  }

}
