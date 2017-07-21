angular.module('IMPERIUM').controller('identificacionController', ['$scope', 'servidorService', '$sessionStorage', '$filter', 'urlUploads', function ($scope, servidorService, $sessionStorage, $filter, urlUploads) {
    $scope.urlUploads = urlUploads;
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

    $scope.exportToPdf = function () {

      var doc = new jsPDF();

      console.log('elemId 12312321', scope.elemId);

      doc.fromHTML(
              document.getElementById(scope.elemId).innerHTML, 15, 15, {
        'width': 170
      });

      doc.save('a4.pdf')

    }

    $scope.pintarTabla();
  }]);

 