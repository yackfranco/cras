<?php

class deletePersonal extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablePersonal();


      $personal = new personalDAOExt($this->getConfig());
      $respuesta1 = $personal->delete($request->getParam('id'));
      $respuesta2 = array(
          'codigo' => ($respuesta1 > 0) ? 200 : 500,
          'usuario' => $respuesta1,
          'mensaje' => 'eliminadoLogico'
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
