
(function() {
    var app = angular.module("edicion-Module", ["edicion-provider"]);
    app.controller("EdicionController",  function($compile, $http, $scope, $routeParams, EdicionService){
        var vm = this;
        $scope.submit = undefined;
        vm.show = false;
        vm.reporte = {data:undefined};            
        vm.usuario = {data:undefined};
        vm.activitiesA = {data:undefined};
        //vm.reporte.data.solucionado="NO";
        $("#enviar").attr("disabled", true);
        $("#enviar").addClass("disabled");
    

        /*
        Traer reporte por folio obtenido de activos
        =====================
        */
        vm.folio = "'"+$routeParams.folio+"'";
        f = $routeParams.folio;
        console.log ("Parametros",f );
        
        if(f!=0){
          getReportes();
        }
        
        function getReportes () {
            
            EdicionService.findReporteByFolio(f,function() {
            });
            vm.reporte = EdicionService.reporte;  
            vm.reporte.data.solucionado="NO";
            EdicionService.findActivities(function(){});
            vm.activitiesA = EdicionService.activitiesP;
        };


        vm.buscar = function () {
            
            EdicionService.findReporteByFolio(vm.reporte.data.id,function() {
            });
            vm.reporte = EdicionService.reporte;  

            vm.reporte.data.solucionado="NO";
            EdicionService.findActivities(function(){});
            vm.activitiesA = EdicionService.activitiesP;
        };


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

        vm.getUsuario = function(){
            EdicionService.getUsuario(function(){});
            vm.usuario = EdicionService.usuario;
        };


        vm.no = function(){
            vm.getUsuario ();
            vm.show=true;
            vm.reporte.data.solucionado="NO";
            vm.reporte.data.status="";
            $("#estatus").removeAttr("disabled", true);
            $("#estatus").removeClass("disabled");

            $("#enviar").removeAttr("disabled", true);
            $("#enviar").removeClass("disabled");

        };

        vm.si = function(){
            vm.show=false;
            vm.reporte.data.solucionado="SI";
            vm.reporte.data.status="Listo";
            $("#estatus").attr("disabled", true);
            $("#estatus").addClass("disabled");

            $("#enviar").removeAttr("disabled", true);
            $("#enviar").removeClass("disabled");
        };

        vm.resetData = function() {
            vm.reporte= {data:undefined};

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




