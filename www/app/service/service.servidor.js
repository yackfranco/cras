angular.module('IMPERIUM').service('servidorService', ['$http', function ($http) {
    
    this.cargarTablaIdentificacion = function (data) {
      return $http.post('http://localhost/cras/www/server.php/cargarTablaIdentificacion', $.param(data));
    };
    
//    this.cargarTablaIdentificacion = $http.get('http://localhost/cras/www/server.php/cargarTablaIdentificacion');
//           this.obtenergra=$http.get('http://localhost/cras/www/server.php/obtenerGrafica');

    this.obtenergra = function (data) {
      return $http.post('http://localhost/cras/www/server.php/obtenerGrafica', $.param(data));
    };

    this.obtenertotal = function (data) {
      return $http.post('http://localhost/cras/www/server.php/cargarTablaTotal', $.param(data));
    };
  }]);