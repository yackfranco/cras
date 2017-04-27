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
                        otherwise('/');
            }
        ]);
