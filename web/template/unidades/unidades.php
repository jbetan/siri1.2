<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

</head>
<body>
<script type="text/ng-template" id="customTemplate.html">
    <a>
        <img ng-src="http://upload.wikimedia.org/wikipedia/commons/thumb/{{match.model.flag}}" width="16">
        <span bind-html-unsafe="match.label | typeaheadHighlight:query"></span>
    </a>
</script>
<div class="section-header">
    <img src="imagen" style="width:60%"; height="180px; margin:0auto;"/>
    <h2 class="text-primary">UNIDADES.</h2>
</div><br/><br/><br/><br/><br/><br/><br/>
<div class="section-body" >
    <div class="row">
        <div class="card panel" id="proveedoresCardForm">
            <div class="card-head card-head-sm collapsed style-primary-light" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-2">
                <header>Agregar Unidad Nueva</header>
                <div class="tools">
                    <a class="btn btn-icon-toggle"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div id="accordion1-2" class="collapse">
                <!-- BEGIN VALIDATION FORM WIZARD -->

                <div class="row" ng-controller="UnidadesController">
                    <div class="col-lg-11" style="margin-left: 50px;">

                        <form action="" class="form">
                            <div class="form-group">
                                <input type="text" id="dir" name="nombre_unidad" class="form-control"/>
                                <label for="">Nombre Unidad</label>
                            </div>
                            <div class="form-group" >Seleccionado {{unidad}}
<!--                              1.  ng-model="unidad" Equivale al $scope.unidad del UnidadesController (ojo)-->
<!--                              2.  for unidad in unidades (Es un ciclo para unidades que equivale al $scope.unidades que recibo en el $http.get.then (ojo))-->
<!--                                La otra parte de typeahead dice que nombre as unidad.nombre    (eso está antes del for -- Indica que voy a obtener del elemento unidad el atributo nombre y le voy a llamar nombre)-->
<!--                                A esta otra parte filter:{nombre:$viewValue}   $viewValue es del typeahead indica el valor que se está escribiendo en el input-->
<!--                                Le estoy poniendo filtrar la lista por el $viewValue pero destro del atributo nombre porque el atributo nombre es el que voy a usar para mostrar en el autocompletar-->
                                <input type="text" ng-model="unidad" typeahead-editable="false" typeahead="unidad.nombre for unidad in unidades.data | filter:{nombre:$viewValue} | limitTo:10" name="direccion_unidad" class="form-control"/>
                                <label >Direccion</label>
                            </div>



                            <div class="form-group">
                                <select name="soporte_unidad" id="" class="form-control">
                                    <option selected>SOPORTE A</option>
                                    <option>SOPORTE B</option>

                                </select>
                                <label for="">Area de Soporte</label>
                            </div>

                            <div class="card-actionbar-row">
                                <button class="btn btn-flat btn-primary ink-reaction" type="submit">AGREGAR</button>
                            </div>
                        </form>
                    </div><!--end .col -->
                </div><!--end .row -->
                <!-- END VALIDATION FORM WIZARD -->
                <div class="card panel" id="proveedoresCardForm">
                    <div class="card-head card-head-sm collapsed style-primary-light" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-3">
                        <header>Ver Unidades Capturadas</header>
                        <div class="tools">
                            <a class="btn btn-icon-toggle"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div id="accordion1-3" class="collapse">
                        <div class="col-lg-12">
                            <table class="table table-hover table-bordered table-condensed">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Area de Soporte</th>


                                </tr>
                                <?php
                                //Que es esto??????
                                //la D/B/ES/ /parotrar los datos de la tabla de
                                //Ok
                                require ("../equipos/conexion.php");


                                $sql="SELECT * FROM unidad";
                                $resultado=mysql_query($sql);
                                while($row=mysql_fetch_array($resultado)){ ?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td><?php echo $row['areasoporte'] ?></td>


                                    </tr>
                                <?php } ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--end .panel -->
    </div>
</div>
</body>
</html>
