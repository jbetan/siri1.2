
(function() {
    var app = angular.module("asigmacion-Module", ["asignacion-provider"]);
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

        vm.message = 'Este es un msj';
        vm.edit = edit;

        vm.dtInstance = {};

        vm.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
                url: 'asignacionController?getReportes=1',
                type: 'POST'
            })
            // or here

            .withDataProp('data')
            .withOption('serverSide', true)
            .withOption('createdRow', createdRow)
            .withBootstrap()
            .withDOM('lfrtip')
            .withPaginationType('full_numbers')// Active ColVis plugin
            .withColVis()
            .withBootstrapOptions({
                ColVis: {
                    classes: {
                        masterButton: 'btn btn-primary'
                    }
                }
            })
            // Add a state change function
            .withColVisStateChange(function(iColumn, bVisible){
                console.log('The column', iColumn, ' has changed its status to', bVisible);
            })
            // Exclude the last column from the list
            .withColVisOption('aiExclude', [2]);


        vm.dtColumns = [
            DTColumnBuilder.newColumn('idr').withTitle('ID'),
            DTColumnBuilder.newColumn('idat').withTitle('ID'),
            DTColumnBuilder.newColumn('folio').withTitle('Id o'),
            DTColumnBuilder.newColumn('finicio').withTitle('Id h'),
            DTColumnBuilder.newColumn('tipoC').withTitle('Id Clase'),
            DTColumnBuilder.newColumn('marca').withTitle('Id Clase'),
            DTColumnBuilder.newColumn('modelo').withTitle('Id Clase'),
            DTColumnBuilder.newColumn('unidad').withTitle('Id Clase'),
            DTColumnBuilder.newColumn('area').withTitle('Id Clase'),
            DTColumnBuilder.newColumn('serie').withTitle('Id Clase'),
            DTColumnBuilder.newColumn('ipcaptura').withTitle('Id Clase'),

            DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
                .renderWith(actionsHtml)
        ];

        function edit (id) {
            vm.message = 'You are trying to edit the row with ID: ' + id;
            vm.dtInstance.reloadData();
        }

        function createdRow(row, data, dataIndex) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }
        function actionsHtml(data, type, full, meta) {
            return '<button class="btn btn-warning" ng-click="admin.edit(' + data.id+ ')">' +
                '   <i class="fa fa-edit"></i>' +
                '</button>&nbsp;';
        }
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