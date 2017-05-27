angular.module('IMPERIUM').service('registroEquipoServices', ['$http', 'serverUrl', function($http, serverUrl){
    
    this.createPersonal = function (data) {
      return $http.post(serverUrl + 'createPersonal', $.param(data));
    };
    
    this.updatePersonal = function (data) {
      return $http.post(serverUrl + 'updatePersonal', $.param(data));
    };
    
    this.deletePersonal = function (data) {
      return $http.post(serverUrl + 'deletePersonal', $.param(data));
    };
    
    this.getPersonal = $http.get(serverUrl + 'getPersonal');
}]);