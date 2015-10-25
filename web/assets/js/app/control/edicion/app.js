
(function() {
    var app = angular.module("edicion-Module", ["edicion-provider"]);
    app.controller("EdicionController", function($compile, $scope, EdicionService){
        var vm = this;
        $scope.submit = undefined;
        vm.show = false;
        vm.reporte = {data:undefined};
        vm.usuario = {data:undefined};
        vm.activitiesA = {data:undefined};

        //*******************Guardar Reporte*****************
        vm.submit = function() {
            if($scope.submit == undefined) {
                console.info("Guardar");
                $scope.submit = $("#formReporte").validate({
                    submitHandler: function (form) {
                        $("#enviar").attr("disabled", true);
                        $("#enviar").addClass("disabled");
                        console.log('validate',vm.reporte.data);

                        EdicionService.guardarReporte(vm.reporte.data, function(data){
                            $("#enviar").removeAttr("disabled", true);
                            $("#enviar").removeClass("disabled");
                            vm.resetData();
                            if(data.error === false) {
                                console.log('',data.message);
                            } else {
                                console.log('',data.message);
                            }
                        });
                    }
                });
            }
        };

        vm.getUsuario = function(){
            EdicionService.findUsuariosByTipo(vm.reporte.data.nivel, vm.reporte.data.subnivel,function(){});
            vm.usuario = EdicionService.usuario;
        };


        vm.no = function(){
            vm.getUsuario ();
            vm.show=true;
            vm.reporte.data.solucionado="NO";
            vm.reporte.data.status="";
            $("#estatus").removeAttr("disabled", true);
            $("#estatus").removeClass("disabled");
        };

        vm.si = function(){
            vm.show=false;
            vm.reporte.data.solucionado="SI";
            vm.reporte.data.status="Listo";
            $("#estatus").attr("disabled", true);
            $("#estatus").addClass("disabled");
        };


        vm.resetData = function() {
            vm.reporte= {data:undefined};

        };

        vm.buscar = function () {
            console.info("funcion buscar");
            EdicionService.findReporteById(vm.reporte.data.id,function() {
            });
            vm.reporte = EdicionService.reporte;

            EdicionService.findActivities(function(){});
            vm.activitiesA = EdicionService.activitiesP;


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