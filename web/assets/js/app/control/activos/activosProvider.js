(function() {
    var app = angular.module("activos-provider", []);
    app.factory("ActivosService", function($http) {
        var service = {};
        service.reporte = {data:{}};
        service.usuario = {data:{}};
        service.activitiesP = {data:{}};



        service.findActivities = function ( callback){
            console.info('Obteniendo Actividades');
            $promese = $http.get("edicionController?buscarActividad=1");
            $promese.then(function(data) {
                console.log('Actividades',data.data);
                service.activitiesP.data = data.data;
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


