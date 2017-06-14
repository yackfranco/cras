<?php

class updateUsuario extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTableUsuario();

     
      $usuario = new usuario();
      $usuario->setCedula($request->getParam('cedula'));
      $usuario->setCelular($request->getParam('celular'));
      $usuario->setCorreo($request->getParam('correo'));
      $usuario->setNombre($request->getParam('nombre'));
      $usuario->setContrasena(hash('md5',$request->getParam('contrasena')));      
      $usuario->setUsuario($request->getParam('usuario'));     
      
      $usuarioDAO = new usuarioDAOExt($this->getConfig());
      
      if ($request->getParam('rol') == "admin" || $request->getParam('rol') == "Administrador") {
        $usuario->setRol_id(1);
      } else {
        $usuario->setRol_id(2);
      }
      //Se pregunta si la contraseña llego vacia o con algun dato
      if ($request->getParam('contrasena') == '') {
        //se hace el update sin la contraseña
        $usuarioDAO->updatesincontra($usuario);
        $respuesta1 = $usuarioDAO->select();
          $respuesta2 = array(
              'codigo' => 200,
              'mensaje' => 'MsinContra',
              'usuario' => $respuesta1
          );
      } else {
        //se hace pregunta si la persona ingreso la contraseña correcta
        $respuesta1 = $usuarioDAO->search($request->getParam('usuario'), hash('md5', $request->getParam('anteriorContra')));
        if (count($respuesta1) > 0) {
//          $usuario->setContrasena($request->getParam('contrasena'));
          //se hace el update con la contraseña
          $usuarioDAO->update($usuario);
          $respuesta1 = $usuarioDAO->select();
          $respuesta2 = array(
              'codigo' => 200,
              'mensaje' => 'MconContra',
              'usuario' => $respuesta1
          );
        } else {
          //la contraseña es incorrecta, y se responde al Angular con un mensaje erroneo
          $respuesta1 = $usuarioDAO->select();
          $respuesta2 = array(
              'codigo' => 200,
              'mensaje' => 'contraseñaIncorrecto',
              'usuario' => $respuesta1
          );
        }
      }
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
