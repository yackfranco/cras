angular.module('IMPERIUM').controller('cesController', ['$scope', 'getDataCesService', function ($scope, getDataService) {
    $scope.consultarDocumento = function () {
      console.log($scope.identificacion);
      getDataService.getInfoPeople({identificacion: $scope.identificacion}).then(function successCallback(answer) {
        console.log(answer);
        if (answer.data.codigo === 200)
        {
          $scope.usuarioErroneo = false;
          console.log("todo bien");
          $scope.identificacion2 = answer.data.usuario[0].per_identificacion;
          $scope.identificacion = null;
          $scope.nombre = answer.data.usuario[0].per_nombre;
          $scope.ficha = answer.data.usuario[0].per_ficha;
          $scope.horaE = answer.data.fecha;
        } else
        {
          //mandarlo al registro de Persolan
          $scope.identificacion = null;
        }
      }, function errorCallback(answer) {
        console.log(answer);
      });
    };


  }]);