angular.module('IMPERIUM').controller('identificacionController', ['$scope', 'servidorService', '$sessionStorage', '$filter', 'urlUploads', function ($scope, servidorService, $sessionStorage, $filter, urlUploads) {

    $scope.urlUploads = urlUploads;
    $scope.tablaIden = {};

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

    $scope.exportData = function () {
        var blob = new Blob([document.getElementById('exportable').innerHTML], {
            type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
        });
        saveAs(blob, "Reporte_Identificacion.xls");
    };

    $scope.pintarTabla();

  }]);