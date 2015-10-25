/**
 * Created by J. Betancourt on 09/07/2015.
 */
(function()
{
    var app = angular.module("reporte-provider", []);
    app.factory("ReporteService", function($http)
    {
        var service = {};
        service.reporte={data:{}};
        service.reportes = {dat:{}};

        service.buscarReportePorId = function (idReporte, callback)
        {
            $promese = $http.get("reporte?id="+idReporte);
            $promese.then(function(data){
                                        service.reporte.data = data.data;
                                        });
            $promese.success(function(){
                                        if(typeof (callback)!= "indefined")
                                        {
                                            callback();
                                        }
                                       });
            return $promese;
        };

        service.guardarReporte = function (data, callback){
          $http({
              url:"reporte?save=1",
              headers:{'Content-Type': 'application/x-www-form-urlencoded'},
              async:true,
              method:'POST'
          })
          .success(function(data)
          {
              if(typeof (callback) != "undefined")
              {
                  callback(data);
              }
          });
        };



        service.buscarReportePorValor = function(value, callback)
        {
            $promese = $http.get("reporte?getList=1&value="+value);
            $promese.then(function(data) {
                                          service.reportes.data = data.data;
                                         });
            $promese.success(function() {
                                         if(typeof (callback) != "undefined")
                                         {
                                          callback();
                                         }
                                        });
            return $promese;
        };

        service.reporteNuevo = function(callback)
        {
            $promese = $http.get("reporte?repNuevos=1");
            $promese.then(function(data) {
                                            service.reportes.data = data.data;
                                         });
            $promese.success(function() {
                                        if(typeof (callback) != "undefined")
                                        {
                                            callback();
                                        }
                                    });
            return $promese;
        };



    });
})();