var app = angular.module('app', [
	'controllers',
	'ngRoute'
]);

app.config(['$routeProvider', '$locationProvider',  function($routeProvider, $locationProvider) {
	
	$routeProvider.when('/', {
		templateUrl: '/app/angularjs/views/dashboard.php',
		controller: 'DashboardController',
	});

}]);


app.run(['$rootScope', '$location', '$http', function($rootScope, $location, $http){

}]);