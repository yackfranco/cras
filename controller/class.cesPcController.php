<?php

class cesPc extends controllerExtended {

  public function main(\request $request) {

//    print_r($request);
//    exit();

    $this->loadTable();

    $consultaPc = new equipoDAOExt($this->getConfig());
    $consultaRegPc = new registroEquipoDAOExt($this->getConfig());
    $RegEquipo = new registroEquipo();

    if ($request->getParam('accion') == "Salida") {
      $consultaRegPc->update($request->getParam('id'));
      $answer = array(
          'accion' => 'ObjetoSalio'
      ); 
    }


    if ($request->getParam('accion') == "llenarTabla") {
      $tabla = $consultaRegPc->searchForPerson($request->getParam('per_id'));
      if (count($tabla) > 0) {
        $answer = array(
            'accion' => 'llenarTabla',
            'objeto' => $tabla
        );
      } else {
        $answer = array(
            'accion' => 'NoLlenarTabla'
        );
      }
    }

    if ($request->getParam('accion') == "ces") {
      $row = $consultaPc->search($request->getParam('serial'));
      if (count($row) > 0) {

        $existeRegistro = $consultaRegPc->selectById($row[0]->equi_id);
        //se pregunta si el equipo existe en la tabla de registro de entrada y salida

        if (count($existeRegistro) > 0) {
          //el equipo ha entrado por lo menos 1 ves al centro
          $equiposAEntrar = $consultaPc->consultaEntradaEquipo($request->getParam('serial'));
          $answer = array(
              'accion' => 'bienesEntrar',
              'objeto' => $equiposAEntrar
          );
        } else {
          //el equipo nunca ha entrado al centro 
          $answer = array(
              'accion' => 'noExistePc',
              'objeto' => $row
          );
        }
      } else {
        $answer = array(
            'accion' => 'noExistePc'
        );
      }
    }


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
