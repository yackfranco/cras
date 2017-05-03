angular.module('IMPERIUM').
        config(['$routeProvider',
            function config($routeProvider) {
                $routeProvider.
                        when('/', {
                            controller: 'loginController',
                            templateUrl: 'app/template/login.html'
                        }).
                        when('/ces', {
                            controller: 'cesController',
                            templateUrl: 'app/template/ces.html'
                        }).
                        when('/copyRight', {
                            controller: 'copyrightController',
                            templateUrl: 'app/template/copyRight.html'
                        }).
                        when('/menuPrincipal', {
                            controller: 'menuPrincipalController',
                            templateUrl: 'app/template/menuPrincipal.html'
                        }).
                        when('/reportes', {
                            controller: 'reportesController',
                            templateUrl: 'app/template/reportes.html'
                        }).
                        when('/reportes', {
                            controller: 'reportesController',
                            templateUrl: 'app/template/reportes.html'
                        }).
                        otherwise('/');
            }
        ]);
