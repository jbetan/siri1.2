/**
 * Created by Brayan on 12/07/2015.
 */
(function(){
    var app= angular.module("equiposoffline-provider2", []);
    app.factory("equiposoffline", function($http){
        var service= {};
        service.ip = {data:{}};
        service.res={data:{}};
        service.buscarip= function(data){

            var q= $http.get("ocs?time="+(new Date()).getTime()+"&"+ data);
            return q;
        };
        service.reporteIp= function(data){

            var reporte= $http.get("ocs?time="+(new Date()).getTime()+"&"+ data);
            /*
             q.then(function(data){
             service.ip.data= data.data;
             console.log(service.ip);
             });
             */
            return reporte;
        };
 //========== consulta la ip y devuelve todos los datos que tenga en su fila en la base de datos ========
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
 //=========== Devuelve unicamente la ip correspondiente al equipo ========
        service.consulta_solo_ip = function(callback){
            var $promese = $http.get("ocs?ver_ip=1");
            $promese.then(function(data) {
                service.res.data = data.data;
                console.log('Solo hay IP: ',service.res);
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };
//================ Recibe el id del reporte guardado ================

        service.recibeID = function(data){
            var reporte= $http.get("verReporte?id="+ data);
            /*
             q.then(function(data){
             service.ip.data= data.data;
             console.log(service.ip);
             });
             */
            return reporte;
        };


/*        service.DevuelveUltimoReporte= function(){
            var $promese = $http.get("verReporte?save2=reporte");
            $promese.then(function(data) {
                service.res.data = data.data;
                console.log('Reportes generado: ',service.res);
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };*/

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
        return service;
    });
})();