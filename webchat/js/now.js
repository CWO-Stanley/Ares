(function () { 
var BoannApp    =   angular.module('BoannApp', ['ngSanitize'])
    .controller("NowPlayController", ['$scope', '$http', '$timeout',  function($scope, $http, $timeout){ 
        render($http, $scope); 
        $scope.setInterval = 15000;
                setInterval(function () {
                        render($http, $scope);                  
                   }, $scope.setInterval); 
                $timeout(function() {
                        render($http, $scope);
                }, $scope.setInterval);                                
        $("#nowplaying").fadeIn(1500);
       
    }]);
}());

function render($http, $scope){
  $http.get("//www.requestserver.eu/myradio/view/com_player/now.php?station="+station).success(function(data){
     $scope.song   =   data;  
   });  
}