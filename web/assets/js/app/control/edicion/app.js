
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
                        console.log(vm.reporte.data.actividad_dos);
                        if(vm.reporte.data.actividad_dos == undefined || vm.reporte.data.actividad_tres == undefined)
                        {
                            if(vm.reporte.data.actividad_dos == undefined){
                                $("#act2").css("border", "2px #EBCCD1 solid");
                                $("#act2").css("border-bottom", "3px #F44336 solid");
                                $(".error").css("display", "block");
                                $("#act2").click(function () {
                                    $(".error").fadeOut();
                                    $("#act2").css("border", "0");
                                });
                                return false;
                            }
                            if(vm.reporte.data.actividad_tres == undefined){
                                $("#act3").css("border", "2px #EBCCD1 solid");
                                $("#act3").css("border-bottom", "3px #F44336 solid");
                                $(".error2").css("display", "block");
                                $("#act3").click(function () {
                                    $(".error2").fadeOut();
                                    $("#act3").css("border", "0");
                                });
                                return false;
                            }
                        }else{
                            $("#enviar").attr("disabled", true);
                            $("#enviar").addClass("disabled");
                            console.log('validate',vm.reporte.data);
                            EdicionService.guardarReporte(vm.reporte.data, function(data){
                                $("#enviar").removeAttr("disabled", true);
                                $("#enviar").removeClass("disabled");
                                vm.resetData();
                                if(data.error == false) {
                                    $('#myModal').modal('show');
                                    console.log('Exito',data.message);
                                } else {
                                    alert('ERROR '+data.message);
                                    console.log('',data.message);
                                }
                            });
                        }
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




