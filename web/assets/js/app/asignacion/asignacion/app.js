
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
                                console.log('Error',data.message);
                                alert('EXITO '+data.message);
                            } else {
                                console.log('OK',data.message);
                                alert('ERROR '+data.message);
                            }
                        });
                    }
                });
            }
        };

        $("#clase").attr("disabled", true);
        $("#clase").addClass("disabled");

        vm.onSelect = function (){
            $("#clase").removeAttr("disabled", true);
            $("#clase").removeClass("disabled");
        }

        vm.usuario = function(){
            AsignacionService.findUsuariosByTipo(function() {});
            vm.usuario = AsignacionService.usuario;
        };

        vm.resetusuario = function() {
            vm.usuario = {data: undefined};
        };

        vm.resetData = function() {
            vm.reporte= {data:undefined};
        };

        vm.buscar = function () {
            vm.reporte.data.tecnico="john";          
            AsignacionService.findReporteById(vm.reporte.data.id,function() {
            });
            vm.reporte =AsignacionService.reporte;

            AsignacionService.findClase(function(){
            });{}
            vm.claseA = AsignacionService.claseP;


        };

        //***************Inicia Data-Table**************

        vm.dtOptions = DTOptionsBuilder.fromSource('asignacionController?getReportes=1').withPaginationType('full_numbers');
        vm.dtColumns = [
                    DTColumnBuilder.newColumn('folio').withTitle('FOLIO'),
                    DTColumnBuilder.newColumn('problema').withTitle('PROBLEMA'),
                    DTColumnBuilder.newColumn('descripcion').withTitle('TIPO'),
                    DTColumnBuilder.newColumn('modelo').withTitle('MODELO'),
                    DTColumnBuilder.newColumn('fechaRecep').withTitle('FECHA DE REPORTE'),
                    DTColumnBuilder.newColumn('personaquereporta').withTitle('REPORTO'),
                    DTColumnBuilder.newColumn('ipcaptura').withTitle('DIRECCION IP'),
                    
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