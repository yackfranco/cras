angular.module('IMPERIUM').controller('registrarUsuarioController', ['$scope', 'crudUsuarioService', 'rolAdmin', 'rolCelador', '$timeout', function ($scope, crudUsuarioService, rolAdmin, rolCelador, $timeout) {

    cargarTabla();
    $scope.datosusu = {};
    $scope.usuel = {};
    $scope.modalact = false;
    $scope.usuarioGuardado = false;
    $scope.usuarioRepetido = false;
    $scope.mensajeError = "";


    $scope.guardarUsuario = function () {
      if ($scope.datosusu.rol == 'Administrador')
        $scope.datosusu.rol = rolAdmin;
      else
        $scope.datosusu.rol = rolCelador;
//      console.log($scope.datosusu);
      crudUsuarioService.guardarUsuario($scope.datosusu).then(function successCallback(respuesta) {
        console.log(respuesta);
        if (respuesta.data.codigo == 200) {
          $scope.datosusu = {};
          $scope.usuarioGuardado = true;
          $scope.tabla = respuesta.data.usuario;
        } else if (respuesta.data.codigo == 350) {
          switch (respuesta.data.accion) {
            case 'VCedula':
              $scope.mensajeError = "La cedula Esta Repetida";
              break;

            case 'VCorreo':
              $scope.mensajeError = "El formato del Correo es invalido";
              break;

            case 'VUsuario':
              $scope.mensajeError = "El Usuario ya existe";
              break;

            case 'VContrasena':
              $scope.mensajeError = "Las contraseñas no coinciden";
              break;
          }
          $scope.usuarioRepetido = true;
          $timeout(function () {
            $scope.usuarioRepetido = false;
          }, 3000);
//          console.log("El usuario Existe");
        }


      }, function errorCallback(respuesta) {
        console.log(respuesta);
      });
    };



    function cargarTabla() {
      crudUsuarioService.cargarTabla.then(function successCallback(respTabla) {
        console.log(respTabla);
        $scope.tabla = respTabla.data.usuario;
      }, function errorCallback(respTabla) {
        console.log(respTabla);
      });
    }

    $scope.editar = function (x, $des = true) {

      if ($des) {
        $scope.modalu = {
          'anteriorContra': '',
          'contrasena': ''
        };
        $scope.modalu.usuario = x.usu_usuario;
        $scope.modalu.cedula = parseInt(x.usu_cedula);
        $scope.modalu.nombre = x.usu_nombre;
        $scope.modalu.rol = x.rol_nombre;
        $scope.modalu.correo = x.usu_correo;
        $scope.modalu.celular = parseInt(x.usu_celular);

        $scope.modtitulo = x.usu_usario;
      } else {
        crudUsuarioService.editarUsuario($scope.modalu).then(function successCallback(respuesta) {
          console.log(respuesta);
          $scope.tabla = respuesta.data.usuario;
          $scope.modalact = false;
          $scope.modalContraIncorrecta = false;
          if (respuesta.data.mensaje == "MconContra") {
            $scope.mensajeactualizar = " Su contraseña y su registro se han Actualizado correctamente";
            $scope.modalact = true;
            $scope.modalu.contrasena = null;
            $scope.modalu.anteriorContra = null;
          }
          if (respuesta.data.mensaje == "MsinContra") {
            $scope.mensajeactualizar = "Su registro se ha Actualizado correctamente";
            $scope.modalact = true;
          }

          if (respuesta.data.mensaje == "contraseñaIncorrecto") {
            $scope.mensajeactualizar = "Contraseña Incorrecta";
            $scope.modalContraIncorrecta = true;
          }

        }, function errorlCallback(respuesta) {

        });
    }
    };

    $scope.eliminar = function (x) {
      $('#myModaleli').modal('toggle');
      $scope.nombre = x.usu_nombre;
//      console.log(x.usu_id);
      $scope.ideliminar = x.usu_id;
    };
    
//    $scope.eliminar = function (x) {
//      $('#ppp').modal('toggle');
//      $scope.usuel.nombre = x.usu_nombre;
////      $scope.contactoEl.nombre = contacto.con_nombre;
////      $scope.contactoEl.apellido = contacto.con_apellido;
////      console.log({id: $scope.contactos.id});
////            $scope.contactoEl.apellido = contacto.apellido;
//      $scope.usuel.ideliminar = x.usu_id;
//    };

    $scope.submitEliminar = function () {
//      console.log($scope.ideliminar);
      crudUsuarioService.eliminarUsuario({id: $scope.ideliminar}).then(function successCallback(respuesta) {
        console.log(respuesta);
        if (respuesta.data.codigo = 500) {
        } else {
          $timeout(function () {
            window.location.reload();
          }, 1000);
        }
        $scope.tabla = respuesta.data.usuario;
        $('#myModaleli').modal('hide');
        location.reload(true);
      }, function errorCallback(respuesta) {
        console.log(respuesta);
      });
    };


    $scope.cerrarModal = function () {
      $scope.modalact = false;
      $scope.modalContraIncorrecta = false;
      $scope.modal = {};
    };

  }]);

