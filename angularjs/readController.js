var crudApp = angular.module('readApp',[]);
crudApp.controller("DbController",['$scope','$http', function($scope,$http){

	getMhs();
	function getMhs()
	{
		// Mengirim request ke file read.php
		$http.post('read.php').success(function(data){
		// Simpan return data dalam scope 
		$scope.database = data;
		});
	}
}]);