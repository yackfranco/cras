angular.module('IMPERIUM').service('registrarEquipoServices', ['$http', 'serverUrl', function($http, serverUrl){
    
    this.createEquipo = function (data) {
      return $http.post(serverUrl + 'createEquipo', $.param(data));
    };
    
//    this.getPersonal = $http.get(serverUrl + 'getPersonal');
}]);