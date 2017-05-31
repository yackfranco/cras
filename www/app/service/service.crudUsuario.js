angular.module('IMPERIUM').service('crudUsuarioService', ['$http', 'serverUrl', function($http, serverUrl){
    
    this.guardarUsuario = function (data){
      return $http.post(serverUrl + 'guardarUsuario', $.param(data));
    };
    
//    this.cargarTabla = function (data){
//      return $http.post(serverUrl + '')
//    }
   this.cargarTabla = $http.get(serverUrl + 'cargarTabla');
}]);






































