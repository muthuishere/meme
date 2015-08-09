var controllers = angular.module( "controllers", [] );

controllers.controller('DashboardController', ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope) {

	$http.get('/api/v1/welcome').
	  success(function(data, status, headers, config) {
	    // this callback will be called asynchronously
	    // when the response is available
	    $scope.message = data.message;
	  }).
	  error(function(data, status, headers, config) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });

}]);


controllers.controller('CanvasController', ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope) {

console.log("loading canvas")

	// $http.get('/api/v1/welcome').
	  // success(function(data, status, headers, config) {
	    // // this callback will be called asynchronously
	    // // when the response is available
	    // $scope.message = data.message;
	  // }).
	  // error(function(data, status, headers, config) {
	    // // called asynchronously if an error occurs
	    // // or server returns response with an error status.
	  // });

}]);