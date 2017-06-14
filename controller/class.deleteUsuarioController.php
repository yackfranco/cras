<?php

class deleteUsuario extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTableUsuario();

//      print_r($request);
//      exit();
      
      $usuario = new usuarioDAOExt($this->getConfig());
      $respuesta1 = $usuario->delete($request->getParam('id'));
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

  private function loadTableUsuario() {
    require $this->getConfig()->getPath() . 'model/table/table.usuario.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.usuario.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.usuarioDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.usuarioDAOExt.php';
  }

}
