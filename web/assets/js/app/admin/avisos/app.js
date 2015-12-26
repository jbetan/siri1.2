var app = angular.module("aviso-module", ["datatables", "ngSanitize"])
app.controller('AvisosController', ['$scope', '$http', 'upload', function ($scope, $http, upload, DTOptionsBuilder, DTColumnBuilder) 
{
	var vm = this;
	vm.avisos = {data:undefined};

	$scope.uploadFile = function()
	{
		var file       = $scope.file;
		var titulo     = $scope.titulo;
		var tipo       = $scope.tipo;
		var tipo_aviso = $scope.tipo_aviso;
		var aviso_des      = $scope.aviso_des;	

		
		
		upload.uploadFile(file, tipo, tipo_aviso, aviso_des, titulo).then(function(res)
		{	
			
			console.log(res);
			$scope.file       = "";
			$scope.titulo     = "";
			$scope.tipo       = "";
			$scope.tipo_aviso = "";
			$scope.aviso_des = "";

			getReportes();
		})
		
	}

	//Llamada a los datos de los avisos
		getReportes();
        function getReportes () {
            console.info("funcion cargar datos");
            $promese = $http.get("avisosController?get_avisos=1");
            $promese.then(function(data) {
                vm.avisos.data = data.data;                 
            });
            return $promese;
        };


        $scope.delete = function(id) {
            
             if(confirm("Desea eleminar el aviso")) {
                 $http({
                url:"avisosController?delete=1&id="+id,
                async: true,
                method: 'GET'
	            }).success(function(data) {
	                if(typeof (callaback) != "undefined") {
	                    callaback(data);
	                }
	                getReportes();
	            });
             }
        }



}])

.directive('uploaderModel', ["$parse", function ($parse) {
	return {
		restrict: 'A',
		link: function (scope, iElement, iAttrs) 
		{
			iElement.on("change", function(e)
			{
				$parse(iAttrs.uploaderModel).assign(scope, iElement[0].files[0]);
			});
		}
	};
}])

app.directive('ckEditor', [function () {
    return {
        require: '?ngModel',
        link: function ($scope, elm, attr, ngModel) {

            var ck = CKEDITOR.replace(elm[0]);

            ck.on('pasteState', function () {
                $scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            });

            ngModel.$render = function (value) {
                ck.setData(ngModel.$modelValue);
            };
        }
    };
}])

.service('upload', ["$http", "$q", function ($http, $q) 
{
	this.uploadFile = function(file, tipo, tipo_aviso, aviso_des, titulo)
	{
		var deferred = $q.defer();
		var formData = new FormData();		
		formData.append("file", file);
		formData.append("titulo", titulo);
		formData.append("tipo", tipo);
		formData.append("tipo_aviso", tipo_aviso);
		formData.append("aviso", aviso_des);
		return $http.post("avisosController?save=1", formData, {
			headers: {
				"Content-type": undefined
			},
			transformRequest: angular.identity
		})
		.success(function(res)
		{
			deferred.resolve(res);
		})
		.error(function(msg, code)
		{
			deferred.reject(msg);
		})
		return deferred.promise;
	}	
}])