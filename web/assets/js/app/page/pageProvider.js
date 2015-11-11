/**
 * Created by Brayan on 07/11/2015.
 */
(function(){
    var app=angular.module("pageOcs-provider",[]);
    app.factory("ipOcs", function($http){
        var service = {};
        service.ipComparada={data:{}};

        service.CompararIP= function(callback){
            var $promese = $http.get("ComparaIP");
            $promese.then(function(data) {
                service.ipComparada.data = data.data;
                console.log("llego al provider de Comparar IP", service.ipComparada);
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };
        return service;
    })
})();