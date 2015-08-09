var app = angular.module('app', [
	'controllers',
	'ngRoute'
]);

app.config(['$routeProvider', '$locationProvider',  function($routeProvider, $locationProvider) {
	

	
	 $routeProvider
        .when('/authenticate', {
           templateUrl: '/app/angularjs/views/dashboard.php',
			controller: 'DashboardController',
        })
        .when('/home', {
              templateUrl: '/app/angularjs/views/canvas.php',
            controller: 'CanvasController'
        })
        .otherwise({
            redirectTo: '/home'
        });
		
		
	

}]);


app.run(['$rootScope', '$location', '$http', function($rootScope, $location, $http){

console.log("halo")

}]);