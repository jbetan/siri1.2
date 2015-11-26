/**
 * Created by J. Betancourt on 07/08/2015.
 */
(function() {
    var app = angular.module("entrega-Module", ["entrega-provider"]);
    app.controller("EntregaController", function($compile,  $http, $routeParams, $scope, EntregaService){
        var vm = this;
        vm.button = true;
        vm.show = false;
        vm.reporte = {data:undefined};
        $scope.submit=undefined;


        /*
        Traer reporte obtenido de activos
        =====================
        */
        vm.folio = "'"+$routeParams.folio+"'";
        f = $routeParams.folio
        vm.folioImp = $routeParams.folio;

        if(f!=0){
              getReportes();
            }
        
        function getReportes () {
            EntregaService.findReporteByFolio(f, function() {
            });
            vm.reporte = EntregaService.reporte;
        };


        vm.submit = function() {
            if($scope.submit == undefined) {
                //console.log("hola");
                $scope.submit = $("#formEntrega").validate({
                    submitHandler: function (form) {
                        $("#enviar").attr("disabled", true);
                        $("#enviar").addClass("disabled");
                        console.log('validate',vm.reporte.data);
                        EntregaService.entregarReporte(vm.reporte.data, function(data){
                            $("#enviar").removeAttr("disabled", true);
                            $("#enviar").removeClass("disabled");
                            vm.resetData();
                            if(data.error == false) {
                                alert('EXITO '+ data.message);
                                console.log('Exito',data.message);
                            } else {
                                alert('ERROR '+data.message);
                                console.log('',data.message);
                            }
                        });
                    }
                });
            }
        };

        vm.resetData = function() {
            vm.reporte= {data:undefined};
        };

        vm.entrega = function()
        {if(!vm.show){vm.show = true;}else{ vm.show = false;}};


      
        vm.buscar = function () {
        EntregaService.findReporteByFolio(vm.reporte.data.id, function() {
        });
            vm.reporte = EntregaService.reporte;
        };

        vm.init = function() {
            setTimeout(function () {
                window.materialadmin.App.initialize();
                window.materialadmin.AppCard.initialize();
                window.materialadmin.AppForm.initialize();
                vm.submit();

            }, 100);
        }

    });
})();