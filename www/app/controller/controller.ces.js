angular.module('IMPERIUM').controller('cesController', ['$scope', 'cesServices', '$location', '$timeout','rolAdmin','$sessionStorage', function ($scope, cesServices, $location, $timeout,rolAdmin,$sessionStorage) {
$scope.focus = true;
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
          $tiempo = 1000;
          //Entrada
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          $scope.horaE = respuesta.data.ultimoRegistro[0].reg_per_entrada;
          $scope.ficha = respuesta.data.persona[0].per_ficha
          $scope.horaS = "";
          $scope.foto = respuesta.data.persona[0].per_foto;
          $scope.alertaEntrada = true;
          $scope.alertaSalida = false;
          

        } else if (respuesta.data.accion == 'actualizo') {
          $tiempo = 1000;
          //Salida
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          $scope.horaE = respuesta.data.ultimoRegistro[0].reg_per_entrada;
          $scope.horaS = respuesta.data.ultimoRegistro[0].reg_per_salida;
          $scope.ficha = respuesta.data.persona[0].per_ficha;
          $scope.foto = respuesta.data.persona[0].per_foto;
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
    
    $scope.salir = function(){
      console.log("Hola Amor  ");
//      console.log($sessionStorage.usuario.rol_id);
      if($sessionStorage.usuario.rol_id == rolAdmin ){
        $location.path("/menuPrincipal");
      }else{
        $location.path("/logout");
      }
    }
    
  }]);
