/**
 * Created by Brayan on 12/07/2015.
 */
(function(){
    var app= angular.module("equiposoffline-provider", []);
    app.factory("equiposoffline", function($http){
        var service= {};
        service.ip = {data:{}};
        service.res={data:{}};
        service.buscarip= function(data){

            var q= $http.get("ocs?time="+(new Date()).getTime()+"&"+ data);
            /*
            q.then(function(data){
                service.ip.data= data.data;
                console.log(service.ip);
            });
            */
            return q;
        };
        service.consultaip = function(callback){
            var $promese = $http.get("ocs");
            $promese.then(function(data) {
                service.res.data = data.data;
                console.log('vvvvvvv',service.res);
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };
        service.guardarReporte= function(data, $scope){
            return $http({
                url:"confirmacion?save=1",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                async: true,
                method: 'POST',
                data: $.param(data)
            }).success(function(data) {
                console.log(data);
            });
        };
        service.guardarReporteAutocomplete= function(data, $scope){
            return $http({
                url:"saveReporteAutocomplete?save2=1",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                async: true,
                method: 'POST',
                data: $.param(data)
            }).success(function(data) {
             //   console.log(data);
            });
        };
        return service;
    });
})();