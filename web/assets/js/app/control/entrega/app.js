/**
 * Created by J. Betancourt on 07/08/2015.
 */
(function() {
    var app = angular.module("entrega-Module", ["entrega-provider"]);
    app.controller("EntregaController", function($compile, $scope, EntregaService){
    var vm = this;
    vm.show = false;
    vm.reporte = {data:undefined};
        $scope.submit=undefined;

        vm.submit = function() {
            if($scope.submit == undefined) {
                //console.log("hola");
                $scope.submit = $("#formEntrega").validate({
                    submitHandler: function (form) {
                        $("#enviar").attr("disabled", true);
                        $("#enviar").addClass("disabled");
                        console.log('validate',vm.reporte.data);
                        EntregaService.guardarUnidades(vm.reporte.data, function(data){
                            $("#enviar").removeAttr("disabled", true);
                            $("#enviar").removeClass("disabled");

                            vm.dtOptions.reloadData();
                            if(data.error === false) {
                                console.log('',data.message);
                            } else {
                                console.log('',data.message);
                            }
                            vm.resetData();
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
        EntregaService.findReporteById(vm.reporte.data.id,function() {
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