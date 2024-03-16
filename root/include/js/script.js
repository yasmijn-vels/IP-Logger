(function(){
	angular.module('app', [])
	.factory('IP', IP)
	.directive('ipAddress', IPAddressDirective)
	.controller('IPController', IPController);

	function IP($http){
		return {
			get: get
		};

		function get(callback){
			callback = callback || angular.noop;
			console.log('Gathering IP...');
			$http.get('https://api.yasmijndev.nl/v2/ip')
				.then(function(response) {
				console.log('Success: ' + response.data.ip);
				callback(response.data.ip);
			}, function(response) {
				console.log('Error: ' + response.status);
				callback('Can\'t retrieve :(');
			});
		};
	};
	
	IPAddressDirective.$inject = ['IP'];
	function IPAddressDirective(IP){
		return {
			restrict: 'E',
			link: function($scope, element, attrs) {
				IP.get(function(data){
					 element.text(data);
				});
			},
			template: 'X.X.X.X'
		};
	};
	
	function IPController(){
		
	};
})();