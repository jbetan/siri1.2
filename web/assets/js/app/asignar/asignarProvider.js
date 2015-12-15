/**
 * Created by Brayan on 29/07/2015.
 */
(function(){
    var app= angular.module("asignar-provider", []);
    app.factory("asignarservice", function($http){
        var service= {};
        service.equipo= {};
        //service.buscarip= function(data){
        //
        //    var q= $http.get("equipos?time="+(new Date()).getTime()+"&"+data);
        //    q.then(function(data){
        //        service.equipo= data.data;
        //        console.log(service.equipo);
        //    });
        //    return q;
        //};
        service.guardarReporte= function(data){
            return $http({
                url:"saveAsignacion?save=1",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                async: true,
                method: 'POST',
                data: $.param(data)
            }).success(function(data) {
                console.log(data);
            });
        };
        //service.guardarReporteAutocomplete= function(data){
        //    return $http({
        //        url:"saveReporteAutocomplete?save2=1",
        //        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        //        async: true,
        //        method: 'POST',
        //        data: $.param(data)
        //    }).success(function(data) {
        //        console.log(data);
        //    });
        //};
        return service;
    });
})();