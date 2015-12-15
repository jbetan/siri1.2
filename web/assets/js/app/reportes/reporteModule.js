/**
 * Created by J. Betancourt on 10/07/2015.
 */
(function() {
    var app = angular.module("reporteModule", ["datatables", "reporte-provider"]);

    app.controller("ReporteController", function($compile, $scope, DTOptionsBuilder, DTColumnBuilder, ReporteService, ServiceApp){
        var vm = this;
        vm.selectProveedor = {data:{
            acreedor:"",
            nombre:"",
            correo: "",
            rfc: "",
            cuenta:""
        }};
        vm.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
                // Either you specify the AjaxDataProp here
                // dataSrc: 'data',
                url: 'proveedores',
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
            DTColumnBuilder.newColumn('id').withTitle('ID'),
            DTColumnBuilder.newColumn('acreedor').withTitle('AcreedorRRRRRRRRRRRRR'),
            DTColumnBuilder.newColumn('nombre').withTitle('Nombre'),
            DTColumnBuilder.newColumn('correo').withTitle('Email'),
            DTColumnBuilder.newColumn('rfc').withTitle('RFC'),
            DTColumnBuilder.newColumn('cuenta').withTitle('NUM. CUENTA'),


            DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
                .renderWith(actionsHtml)
        ];
        vm.edit = function(id) {
            ServiceApp.loadingAction("active");
            setTimeout(function(){window.materialadmin.AppForm._initFloatingLabels();}, 200);
            var card = $('#proveedoresCardForm');
            if(!card.find(".card-head").hasClass("collapsed")) {
                card.find(".card-head").find("A").trigger("click");
            }
            ReporteService.findProveedorById(id, function() {
                ServiceApp.loadingAction("close");
                var card = $('#proveedoresCardForm');
                if(card.find(".card-head").hasClass("collapsed")) {
                    card.find(".card-head").find("A").trigger("click");
                }
            });
            vm.selectProveedor = ReporteService.proveedor;
            setTimeout(function(){
                window.materialadmin.AppForm._initFloatingLabels();
            }, 200);
        };

        vm.resetProveedor = function() {
            vm.selectProveedor = {data:undefined};
        };

        vm.submit = function() {
            if($scope.submit == undefined) {
                $scope.submit = $("#formReporte").validate({
                    submitHandler: function (form) {
                        ServiceApp.loadingAction("active");
                        $("#enviar").attr("disabled", true);
                        $("#enviar").addClass("disabled");
                        ReporteService.guardarReporte($(form).serialize(), function(data)
                        {
                            ServiceApp.loadingAction("close");
                            $("#enviar").removeAttr("disabled", true);
                            $("#enviar").removeClass("disabled");

                            vm.resetProveedor();

                        });
                    }
                });
            }
        };

        vm.validaDatosActivos = function(){
            return "";
        };
        function createdRow(row, data, dataIndex) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }
        function actionsHtml(data, type, full, meta) {
            return '<button class="btn btn-warning" ng-click="tableCase.edit(' + data.id + ')">' +
                '   <i class="fa fa-edit"></i>' +
                '</button>&nbsp;' +
                '<button class="btn btn-danger" ng-click="tableCase.deleteRow(' + data.id + ')">' +
                '   <i class="fa fa-trash-o"></i>' +
                '</button>';
        }
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
