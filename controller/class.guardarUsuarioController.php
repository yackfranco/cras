<?php

class guardarUsuario extends controllerExtended {

  public function main(\request $request) {
    try {
      
      //codigo 350 es para saber que el usuario existe
      $this->loadTableUsuario();
      $usuarioDAO = new usuarioDAOExt($this->getConfig());
      $validarUsuario = $usuarioDAO->searchUser($request->getParam('usuario'));
      if ($validarUsuario > 0) {
        $respuesta2 = array(
            'codigo' => 350
//            'usuario' => $respuesta
        );
      } else {
        $cedula = $request->getParam('cedula');
        $nombre = $request->getParam('nombre');
        $celular = $request->getParam('celular');
        $correo = $request->getParam('correo');
        $user = $request->getParam('usuario');
        $password = hash($this->getConfig()->getHash(), $request->getParam('contrasena'), false);
        $rol = $request->getParam('rol');

        $usuario = new usuario();
        $usuario->setCedula($cedula);
        $usuario->setNombre($nombre);
        $usuario->setCelular($celular);
        $usuario->setCorreo($correo);
        $usuario->setUsuario($user);
        $usuario->setContrasena($password);
        $usuario->setRol_id($rol);

//      $usuarioDAO = new usuarioDAO($this->getConfig());
        $respuesta1 = $usuarioDAO->insert($usuario);

        if (count($respuesta1) > 0) {
          $respuesta1 = $usuarioDAO->select();
        }

        $respuesta2 = array(
            'codigo' => (count($respuesta1) > 0) ? 200 : 500,
            'usuario' => $respuesta1
        );
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
