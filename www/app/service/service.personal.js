angular.module('IMPERIUM').service('personalServices', ['$http', 'serverUrl', function($http, serverUrl){
    
    this.createPersonal = function (data) {
      return $http.post(serverUrl + 'createPersonal', $.param(data));
    };
  
  
    this.updatePersonal = function (data) {
      return $http.post(serverUrl + 'updatePersonal', $.param(data));
    };
    
    
    this.deletePersonal = function (data) {
      return $http.post(serverUrl + 'deletePersonal', $.param(data));
    };
    
      this.searchPersonal = function (data) {
      return $http.post(serverUrl + 'buscarPersonal', $.param(data));
    };
    
    // this.getPersonal = $http.get(serverUrl + 'getPersonal');
     this.cargarTablaP = $http.get(serverUrl + 'cargarTablaP');
}]);
