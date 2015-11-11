
(function() {
    var app = angular.module("asigmacion-Module", ["datatables", "asignacion-provider"]);
    app.controller("AsignacionController", function($compile, $scope, AsignacionService,  DTOptionsBuilder, DTColumnBuilder){
        var vm = this;
        $scope.submit = undefined;
        vm.show = false;
        vm.reporte = {data:undefined};
       // vm.reporte ={data:"john"};
        vm.claseA = {data:undefined};
        vm.usuario = undefined;

        //*******************Guardar Reporte*****************
        vm.submit = function() {
            if($scope.submit == undefined) {
                console.info("Guardar");
                $scope.submit = $("#formReporte").validate({
                    submitHandler: function (form) {
                        $("#enviar").attr("disabled", true);
                        $("#enviar").addClass("disabled");
                        console.log('validate',vm.reporte.data);

                        AsignacionService.guardarReporte(vm.reporte.data, function(data){
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

        vm.usuario = function(){
            AsignacionService.findUsuariosByTipo(function() {
            });
            vm.usuario = AsignacionService.usuario;
        };

        vm.resetusuario = function() {
            vm.usuario = {data: undefined};

        };

        vm.asignar = function()
        {
            switch(vm.reporte.data.asignar)
            {
                case "Soporte A":
                    //vm.reporte.data.usuarioD ='';
                    //vm.resetusuario();
                    AsignacionService.findUsuariosByTipo('SOPORTE A',function() {
                    });
                    vm.usuario = AsignacionService.usuario;
                    vm.reporte.data.usuarioD = vm.usuario.data.nombre;
                    //$("#usuario").attr("disabled", true);
                    //$("#usuario").addClass("disabled");
                    break;
                case "Soporte B":
                    //vm.resetusuario();
                    AsignacionService.findUsuariosByTipo('SOPORTE B',function() {
                    });
                    vm.usuario = AsignacionService.usuario;
                   // $("#usuario").attr("disabled", true);
                   // $("#usuario").addClass("disabled");
                    break;
                case "Telecomunicaciones":
                    vm.resetusuario();
                    AsignacionService.findUsuariosByTipo('TELECOM',function() {
                    });
                    vm.usuario = AsignacionService.usuario;
                  //  $("#usuario").attr("disabled", true);
                   // $("#usuario").addClass("disabled");
                    break;

                default :
                    AsignacionService.findUsuariosByOtro(function() {
                    });
                    vm.usuario = AsignacionService.usuario;
                    $("#usuario").removeAttr("disabled", true);
                    $("#usuario").removeClass("disabled");
                    break;

            }
        };





        vm.resetData = function() {
            vm.reporte= {data:undefined};

        };

        vm.buscar = function () {

            vm.reporte.data.tecnico="john";

            console.info("funcion buscar");
            AsignacionService.findReporteById(vm.reporte.data.id,function() {
            });
            vm.reporte =AsignacionService.reporte;


            //console.log('unidad App',AsignacionService.reporte.data.unidad);
           // AsignacionService.findUsuariosByTipo('SOPORTE A',function() {
            //});
            //vm.usuario = AsignacionService.usuario;


            AsignacionService.findClase(function(){
            });{}
            vm.claseA = AsignacionService.claseP;


        };

                //***************Inicia Data-Table**************
                vm.dtOptions = DTOptionsBuilder.fromSource('asignacionController?getReportes=1')
                .withPaginationType('full_numbers');
                vm.dtColumns = [
                DTColumnBuilder.newColumn('folio').withTitle('FOLIO'),
                DTColumnBuilder.newColumn('fechaRecep').withTitle('FECHA'),
                DTColumnBuilder.newColumn('descripcion').withTitle('TIPO'),
                // DTColumnBuilder.newColumn('folio').withTitle('MARCA'),
                DTColumnBuilder.newColumn('modelo').withTitle('MODELO'),
                // DTColumnBuilder.newColumn('folio').withTitle('AREA'),
                DTColumnBuilder.newColumn('numdeserie').withTitle('# DE SERIE'),
                DTColumnBuilder.newColumn('ipcaptura').withTitle('DIRECCION IP'),
                DTColumnBuilder.newColumn('problema').withTitle('PROBLEMA'),
                DTColumnBuilder.newColumn('problema').withTitle('Last name').notVisible()
                ];
                //***************Termina Data-Table**************

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