angular.module('IMPERIUM').controller('registrarUsuarioController', ['$scope', 'crudUsuarioService', 'rolAdmin', 'rolCelador', function ($scope, crudUsuarioService, rolAdmin, rolCelador) {
    cargarTabla();
    $scope.datosusu = {};

    $scope.modalact = false;
    $scope.usuarioGuardado = false;

    $scope.guardarUsuario = function () {
      if ($scope.datosusu.rol == 'Administrador')
        $scope.datosusu.rol = rolAdmin;
      else
        $scope.datosusu.rol = rolCelador;
      console.log($scope.datosusu);
      crudUsuarioService.guardarUsuario($scope.datosusu).then(function successCallback(respuesta) {
        console.log(respuesta);
        if (respuesta.data.codigo == 200) {
          $scope.datosusu = {};
          $scope.usuarioGuardado = true;
          $scope.tabla = respuesta.data.usuario;
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
        $scope.modal = {
          'anteriorContra': '',
          'contrasena': ''
        };
        $scope.modal.usuario = x.usu_usuario;
        $scope.modal.cedula = parseInt(x.usu_cedula);
        $scope.modal.nombre = x.usu_nombre;
        $scope.modal.rol = x.rol_nombre;
        $scope.modal.correo = x.usu_correo;
        $scope.modal.celular = parseInt(x.usu_celular);


        $scope.modtitulo = x.usu_usuario;

      } else {
//        
//        console.log($scope.modal);
        crudUsuarioService.editarUsuario($scope.modal).then(function successCallback(respuesta) {
          console.log(respuesta);
          $scope.tabla = respuesta.data.usuario;
          $scope.modalact = false;
          $scope.modalContraIncorrecta = false;
          if (respuesta.data.mensaje == "MconContra") {
            $scope.mensajeactualizar = " Su contraseña y su registro se han Actualizado correctamente";
            $scope.modalact = true;
            $scope.modal.contrasena = null;
            $scope.modal.anteriorContra = null;
          }
          if (respuesta.data.mensaje == "MsinContra") {
            $scope.mensajeactualizar = "Su registro se ha Actualizado correctamente";
            $scope.modalact = true;
          }
          
          if(respuesta.data.mensaje=="contraseñaIncorrecto"){
            $scope.mensajeactualizar = "Contraseña Incorrecta";
            $scope.modalContraIncorrecta = true;
          }

        }, function errorCallback(respuesta) {

        });
//          console.log($scope.modal);
    }
//      console.log($scope.modal);

    }

    $scope.cerrarModal = function () {
//      console.log("fokiu");
      $scope.modalact = false;
       $scope.modalContraIncorrecta = false;
      $scope.modal = {};
    }

  }]);

