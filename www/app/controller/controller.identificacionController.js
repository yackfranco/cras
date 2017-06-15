angular.module('IMPERIUM').controller('identificacionController', ['$scope', 'servidorService','$sessionStorage', function ($scope, servidorService,$sessionStorage) {
    $scope.tablaIden = {};
    console.log($sessionStorage.reporte);

    $scope.pintarTabla = function () {
      servidorService.cargarTablaIdentificacion.then(function successCallback(response) {
        console.log(response);
      switch (response.data.codigo) {
        case 200:
          $scope.tablaIden = response.data.usuario;
          break;
        case 500:
          $scope.tablaIden = {};
      }
      }), function errorCallback(response) {
        console.log(response);
      };
    };

$scope.pintarTabla();
  }]);

 