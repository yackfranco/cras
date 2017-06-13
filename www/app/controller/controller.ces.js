angular.module('IMPERIUM').controller('cesController', ['$scope', 'cesServices', '$location', '$timeout', function ($scope, cesServices, $location, $timeout) {

    $scope.alertaEntrada = false;
    $scope.alertaSalida = false;
    $scope.RegistroEquipo = false;
    $tiempo = 1000;

    $scope.consultarDocumento = function () {
      cesServices.validarExistencia({id: $scope.identificacion}).then(function successCallback(respuesta) {
        console.log(respuesta.data.accion);
        console.log(respuesta.data);
        $scope.identificacion2 = $scope.identificacion;
        $scope.identificacion = "";

        if (respuesta.data.accion == 'inserto') {
          //Entrada
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          $scope.horaE = respuesta.data.ultimoRegistro[0].reg_per_entrada;
          $scope.ficha = respuesta.data.persona[0].per_ficha
          $scope.horaS = "";
          $scope.alertaEntrada = true;
          $scope.alertaSalida = false;

        } else if (respuesta.data.accion == 'actualizo') {
          //Salida
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          $scope.horaE = respuesta.data.ultimoRegistro[0].reg_per_entrada;
          $scope.horaS = respuesta.data.ultimoRegistro[0].reg_per_salida;
          $scope.ficha = respuesta.data.persona[0].per_ficha;
          $scope.alertaEntrada = false;
          $scope.alertaSalida = true;

        } else {
          //la persona no existe
          $scope.alertaEntrada = false;
          $scope.alertaSalida = false;
          $location.path("/registroPersonal");
        }

        $timeout(function () {
          $scope.alertaEntrada = false;
          $scope.alertaSalida = false;
        }, $tiempo);

      }, function errorCallback(answer) {

      });
    
    
    
    };
    
    $scope.registrarEquipo = function(){
      $scope.RegistroEquipo = true;
      $location.path("/registrarEquipo");
    }
  }]);
