<?php

class obtenerGrafica extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadGrafica();


      $fechainicio = $request->getParam('fechaInicio');
      $fechafin = $request->getParam('fechaFin');

//      print_r($request);
//      exit();
      
      $registroPersonalDAO = new registroPersonalDAOExt($this->getConfig());
      $respuesta1 = $registroPersonalDAO->selectEntradaSalida($fechainicio, $fechafin); //$fechainicio, $fechafin
      $respuesta2 = array(
          'code' => ($respuesta1 > 0) ? 200 : 500,
          'datos' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadGrafica() {
    require $this->getConfig()->getPath() . 'model/table/table.registroPersonal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.registroPersonal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.registroPersonalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.registroPersonalDAOExt.php';
  }

}
