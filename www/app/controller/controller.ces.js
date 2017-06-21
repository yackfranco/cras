angular.module('IMPERIUM').controller('cesController', ['$scope', 'cesServices', '$location', '$timeout', 'rolAdmin', '$sessionStorage', function ($scope, cesServices, $location, $timeout, rolAdmin, $sessionStorage) {
    $scope.focus = true;
    $scope.alertaEntrada = false;
    $scope.alertaSalida = false;
    $scope.RegistroEquipo = false;
    $tiempo = 1000;
    $scope.ShowFoto = false;
    $tablaPc = false;
    $reg_per_id = "";


    $scope.consultarDocumento = function () {
      cesServices.validarExistencia({id: $scope.identificacion}).then(function successCallback(respuesta) {
        console.log(respuesta.data.accion);
        console.log(respuesta.data);
        $scope.identificacion2 = $scope.identificacion;
        $scope.identificacion = "";

        if (respuesta.data.accion == 'inserto') {
          $tiempo = 1000;
          //Entrada
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          console.log(respuesta.data.ultimoRegistro[0].reg_per_entrada);
          $scope.horaE = moment(respuesta.data.ultimoRegistro[0].reg_per_entrada, 'YYYY-MM-DD H:mm:ss').format('H:mm:ss');
          $scope.ficha = respuesta.data.persona[0].per_ficha
          $scope.horaS = "";
          $scope.alertaEntrada = true;
          $scope.alertaSalida = false;
          $reg_per_id = respuesta.data.ultimoRegistro[0].reg_per_id;
          $scope.ShowFoto = true;
          if (respuesta.data.persona[0].per_foto) {
            $scope.foto = "app/pictures/" + respuesta.data.persona[0].per_foto;
          } else {
            $scope.foto = "app/pictures/userDefault.png";
          }
        } else if (respuesta.data.accion == 'actualizo') {
          $tiempo = 1000;
          //Salida
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          $scope.horaE = moment(respuesta.data.ultimoRegistro[0].reg_per_entrada, 'YYYY-MM-DD H:mm:ss').format('HH:mm:ss');
          $scope.horaS = moment(respuesta.data.ultimoRegistro[0].reg_per_salida, 'YYYY-MM-DD H:mm:ss').format('HH:mm:ss');
          $scope.ficha = respuesta.data.persona[0].per_ficha;
          $reg_per_id = respuesta.data.ultimoRegistro[0].reg_per_id;
//          $scope.foto = "app/pictures/"+respuesta.data.persona[0].per_foto;
          $scope.ShowFoto = true;
          if (respuesta.data.persona[0].per_foto) {
            $scope.foto = "app/pictures/" + respuesta.data.persona[0].per_foto;
          } else {
            $scope.foto = "app/pictures/userDefault.png";
          }
          $scope.alertaEntrada = false;
          $scope.alertaSalida = true;

        } else {
          //la persona no existe
          $sessionStorage.savePersonFromCes = true;
          $scope.alertaEntrada = false;
          $scope.alertaSalida = false;
          $location.path("/registroPersonal");
          $scope.ShowFoto = false;
        }

        $timeout(function () {
          $scope.alertaEntrada = false;
          $scope.alertaSalida = false;
        }, $tiempo);

      }, function errorCallback(answer) {

      });
    };


    if ($sessionStorage.registroCreado) {
      $scope.identificacion = $sessionStorage.registroCreado;
      delete $sessionStorage.registroCreado;
      $scope.consultarDocumento();
    }


    $scope.registrarEquipo = function () {
      $scope.RegistroEquipo = true;
    }

    $scope.registrarPc = function () {
      cesServices.cesPc({serial: $scope.registroEquipo, idPersona: $reg_per_id}).then(function successCallback(respuesta) {
        console.log(respuesta);
      }, function errorCallback(resp) {
        console.log(respuesta);
      });
    }








    $scope.salir = function () {
      if ($sessionStorage.usuario.rol_id == rolAdmin) {
        $location.path("/menuPrincipal");
      } else {
        $location.path("/logout");
      }
    }

  }]);
