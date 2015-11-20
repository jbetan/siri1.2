(function() {
    var app = angular.module("entrega-provider", []);
    app.factory("EntregaService", function($http) {
        var service = {};
        service.reporte = {data:{}};

        service.guardarUnidades = function (data, callback){
            console.log('providerReporte',data);
            $http({
                url:"entregaController?guardarRepEntrega=1",
                data:$.param(data),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                async: true,
                method: 'POST'
            }).success(function(data){
                if(typeof (callback) != "undefined") {
                    callback(data);
                }
            });
        };

        service.findReporteByFolio = function(id, callback){
            $promese = $http.get("entregaController?buscarReporte=1&id="+id);
            $promese.then(function(data) {
                if(data.status == 'ERROR'){ 
                    alert(data.message);
                }else{
                        alert(data.data.message);
                }
                service.reporte.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        return service;
    });
})();


