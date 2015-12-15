/**
 * Created by Renan on 02/06/2015.
 */
(function() {
    var app = angular.module("proveedoresModule", ["datatables", "proveedores-provider"]);

    app.controller("ProveedoresController", function($compile, $scope, DTOptionsBuilder, DTColumnBuilder, ProveedoresService, ServiceApp){
        var vm = this;
        vm.selectProveedor =
        {
            data:{
                acreedor:"",
                nombre:"",
                correo: "",
                rfc: "",
                cuenta:""
            }
        };


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
umnBuilder.newColumn(null).withTitle('Actions').notSortable()
                .renderWith(actionsHtml)
        ];
        vm.edit = function(id) {
            ServiceApp.loadingAction("active");
            setTimeout(function(){window.materialadmin.AppForm._initFloatingLabels();}, 200);

            ProveedoresService.findProveedorById(id, function() {
                ServiceApp.loadingAction("close");
                var card = $('#proveedoresCardForm');
                if(card.find(".card-head").hasClass("collapsed")) {
                    card.find(".card-head").find("A").trigger("click");
                }
            });
            vm.selectProveedor = ProveedoresService.proveedor;
            setTimeout(function(){
                window.materialadmin.AppForm._initFloatingLabels();
            }, 200);
        };

        vm.resetProveedor = function() {
            vm.selectProveedor = {data:undefined};
        };

        vm.submit = function() {
            if($scope.submit == undefined) {
                $scope.submit = $("#formProveedores").validate({
                    submitHandler: function (form) {
                        ServiceApp.loadingAction("active");
                        $("#enviar").attr("disabled", true);
                        $("#enviar").addClass("disabled");
                        ProveedoresService.saveProveedor($(form).serialize(), function(data) {
                            ServiceApp.loadingAction("close");
                            $("#enviar").removeAttr("disabled", true);
                            $("#enviar").removeClass("disabled");
                            vm.resetProveedor();
                            if(data.error === false) {
                                ServiceApp.notification('', data.message, ServiceApp.typeNotification.SUCCESS);
                                var card = $('#proveedoresCardForm');
                                if (!card.find(".card-head").hasClass("collapsed")) {
                                    card.find(".card-head").find("A").trigger("click");
                                }
                                vm.dtOptions.reloadData();
                            } else {
                                ServiceApp.notification('',data.message, ServiceApp.typeNotification.ERROR);
                            }
                        });
                    }
                });
            }
        };
        vm.deleteRow = function(id) {
            if(confirm("Confirmar eliminar el Rol?")) {
                ServiceApp.loadingAction("active");
                ProveedoresService.delete(id, function(data) {
                    ServiceApp.loadingAction("close");
                    if(data.error === false) {
                        ServiceApp.notification('', data.message, ServiceApp.typeNotification.SUCCESS);
                        vm.dtOptions.reloadData();
                    } else {
                        ServiceApp.notification('', data.message, ServiceApp.typeNotification.ERROR);
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