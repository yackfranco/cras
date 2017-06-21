angular.module('IMPERIUM').controller('identificacionController', ['$scope', 'servidorService', '$sessionStorage','$filter', function ($scope, servidorService, $sessionStorage,$filter) {
    $scope.tablaIden = {};
//    console.log($sessionStorage.reporte);

    $sessionStorage.reporte.IfechaInicio = $filter('date')($sessionStorage.reporte.IfechaInicio, 'yyyy-MM-dd') + ' 00:00:00';
    $sessionStorage.reporte.IfechaFinal = $filter('date')($sessionStorage.reporte.IfechaFinal, 'yyyy-MM-dd') + ' 23:59:59';

    $scope.pintarTabla = function () {
      servidorService.cargarTablaIdentificacion($sessionStorage.reporte).then(function successCallback(response) {
        console.log(response);
        switch (response.data.codigo) {
          case 200:
            $scope.tablaIden = response.data.usuario;
            break;
          case 500:
            $scope.tablaIden = {};
        }
      }), function errorCallback(response) {
//        console.log(response);
      };
    };

    $scope.pintarTabla();
  }]);

 