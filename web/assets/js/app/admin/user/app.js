(function() {
    var app = angular.module("user-Module", ["datatables", "user-provider"]);
    app.controller("UserController", function($compile, $scope, DTOptionsBuilder, DTColumnBuilder, UserService){

        $scope.submit=undefined;
        var vm = this;
        vm.user= {data:undefined};

        vm.resetData = function() {
            vm.user= {data:undefined};
        };

        //***********************Guardar Usuario*************************
        vm.submit = function() {

            if($scope.submit == undefined) {
                $scope.submit = $("#formUsuarios").validate({
                    submitHandler: function (form) {
                        $("#enviar").attr("disabled", true);
                        $("#enviar").addClass("disabled");
                        console.log('validate',vm.user.data);
                        UserService.guardarUsuario(vm.user.data, function(data){
                            $("#enviar").removeAttr("disabled", true);
                            $("#enviar").removeClass("disabled");
                           
                            if(data.error === false) {
                                console.log("OK",data.message);
                                alert(data.message);
                                 vm.dtOptions.reloadData();
                                 vm.resetData();
                            } else {
                                alert(data.message);
                                console.log("ERROR",data.message);
                            }

                            
                        });
                    }
                });
            }
        };

        //***************Data-Table**************

        vm.message = 'Este es un msj';
        vm.edit = edit;
        vm.delete = deleteRow;
        vm.dtInstance = {};

        vm.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
                // Either you specify the AjaxDataProp here
                // dataSrc: 'data',

                url: 'usuariosController?verUser=1',
                //url: 'admin?verUnidades=1',
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
            DTColumnBuilder.newColumn('nombre').withTitle('Nombre Usuario'),           
            DTColumnBuilder.newColumn('matricula').withTitle('Matricula'),
            DTColumnBuilder.newColumn('tipo').withTitle('Tipo'),       
            DTColumnBuilder.newColumn('esCDI').withTitle('CDI'),

            DTColumnBuilder.newColumn('esCOORDINAD').withTitle('COOR'),


            DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
                .renderWith(actionsHtml)
        ];

        function edit (id) {
            //vm.message = 'You are trying to edit the row with IDSSS: ' + id;
            //ServiceApp.loadingAction("active");
            setTimeout(function(){window.materialadmin.AppForm._initFloatingLabels();}, 200);

            UserService.findUserById(id, function() {
                //ServiceApp.loadingAction("close");
                var card = $('#userCardForm');
                if(card.find(".card-head").hasClass("collapsed")) {
                    card.find(".card-head").find("A").trigger("click");
                }
            });
            
            vm.user = UserService.usuario;

            setTimeout(function(){
                $scope.$apply();
                console.info('fomulario',vm.user.data);
                window.materialadmin.AppForm._initFloatingLabels();
            }, 200);

           
        }
        function deleteRow(id) {
           // vm.message = 'You are trying to remove the row with IDOOO: ' + id;
            if(confirm("Confirmar eliminar la unidad ?")) {
                //ServiceApp.loadingAction("active");

                UserService.deleteUser(id, function(data) {
                    //ServiceApp.loadingAction("close");
                    if(data.error === false) {
                        //ServiceApp.notification('', data.message, ServiceApp.typeNotification.SUCCESS);
                       alert(data.message);
                        vm.dtOptions.reloadData();
                    } else {
                        alert(data.message + " o el usuario tiene relacion con un reporte");
                       // console.log('',);
                        //ServiceApp.notification('', data.message, ServiceApp.typeNotification.ERROR);
                    }
                });
            }
        }
        function createdRow(row, data, dataIndex) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }
        function actionsHtml(data, type, full, meta) {
            return '<button class="btn btn-warning" ng-click="admin.edit(' + data.id+ ')">' +
                '   <i class="fa fa-edit"></i>' +
                '</button>&nbsp;' +
                '<button class="btn btn-danger" ng-click="admin.delete(' + data.id + ')">' +
                '   <i class="fa fa-trash-o"></i>' +
                '</button>';
        }




        vm.init=function(){
            setTimeout(function () {
                window.materialadmin.App.initialize();
                window.materialadmin.AppCard.initialize();
                window.materialadmin.AppForm.initialize();
                vm.submit();
            }, 100);
        };

    });//Finaliza la llave del controlador
})();//Finaliza llave del Modulo