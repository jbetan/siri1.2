/**
 * Created by Brayan on 09/11/2015.
 */
(function(){
    var app= angular.module("app-confirm", ["equiposoffline-provider"]);
    app.controller("confirmController",function($http, $scope){
        jQuery.extend({
            /**
             * Returns get parameters.
             *
             * If the desired param does not exist, null will be returned
             *
             * @example value = $.getURLParam("paramName");
             */
            getURLParam: function(strParamName){
                var strReturn = "";
                var strHref = window.location.href;
                var bFound=false;

                var cmpstring = strParamName + "=";
                var cmplen = cmpstring.length;

                if ( strHref.indexOf("?") > -1 ){
                    var strQueryString = strHref.substr(strHref.indexOf("?")+1);
                    var aQueryString = strQueryString.split("&");
                    for ( var iParam = 0; iParam < aQueryString.length; iParam++ ){
                        if (aQueryString[iParam].substr(0,cmplen)==cmpstring){
                            var aParam = aQueryString[iParam].split("=");
                            strReturn = aParam[1];
                            bFound=true;
                            break;
                        }

                    }
                }
                if (bFound==false) return null;
                return strReturn;
            }
        });
        $scope.folio = "";
        $scope.unidad = "";
        $scope.area = "";
        $scope.tipo = "";
        $scope.marca = "";
        $scope.modelo = "";
        $scope.Nserie = "";
        $scope.fecha = "";
        $scope.ip = "";
        $scope.problema = "";
        //vm.ip = {data:undefined};
        var parametro = $.getURLParam("id");
        console.log("La id es: ", parametro);
         $http.get('confirmacionModel?id='+ parametro).success(function(data){
             console.log(data);
             $scope.folio = data[2];
             $scope.unidad = data[4];
             $scope.area = data[5];
             $scope.tipo = data[8];
             $scope.marca = data[9];
             $scope.modelo = data[6];
             $scope.Nserie = data[7];
             $scope.fecha = data[1];
             $scope.ip = data[0];
             $scope.problema = data[3];
             //console.log("********",$scope.folio);
             //document.getElementById("folio").value = data.folio;
             /*$.each($scope.datos, function(index, value){
              console.log("Llego el "+ index + "y el valor: "+ value);
              var nombre = [this.ipcaptura];
              console.log("get ====",nombre);
              });*/
            //console.log(data.folio);
        });
        console.log("sale ",$scope.datos);
        return $scope.datos;
    })
})();