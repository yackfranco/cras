angular.module('IMPERIUM').service('getDataCesService', ['$http', function($http){
    
    this.getInfoPeople = function (data) {
      return $http.post('http://localhost/cras/www/server.php/getDataCes', $.param(data));
    };

    // this.getUser = $http.get('http://localhost/cras/www/server.php/obtener_usuarios');
}]);