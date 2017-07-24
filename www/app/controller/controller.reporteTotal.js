angular.module('IMPERIUM').controller('totalController', ['$scope', 'servidorService', '$sessionStorage', '$filter', 'urlUploads', function ($scope, servidorService, $sessionStorage, $filter, urlUploads) {

    $scope.urlUploads = urlUploads;
    $scope.tablaTot = {};
//    console.log($sessionStorage.reporte);

    $sessionStorage.reporte.fechInicio = $filter('date')($sessionStorage.reporte.fechInicio, 'yyyy-MM-dd') + ' 00:00:00';
    $sessionStorage.reporte.fechFin = $filter('date')($sessionStorage.reporte.fechFin, 'yyyy-MM-dd') + ' 23:59:59';

    $scope.pintarTabla = function () {
      servidorService.obtenertotal($sessionStorage.reporte).then(function successCallback(response) {
        console.log(response);
        switch (response.data.codigo) {
          case 200:
            $scope.tablaTot = response.data.usuario;
            break;
          case 500:
            $scope.tablaTot = {};
        }
      }), function errorCallback(response) {
//        console.log(response);
      };
    };

    $scope.exportData = function () {
      var blob = new Blob([document.getElementById('exportable').innerHTML], {
        type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
      });
      saveAs(blob, "Reporte_Total.xls");
    };
    $scope.pintarTabla();
  }]);


