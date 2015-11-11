<!DOCTYPE html>
<html lang="en" ng-app="equipos-module">
<head>
    <title><?=$this->title?></title>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->
    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <!-- END STYLESHEETS -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?= $this->contextPath?>/web/assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="<?= $this->contextPath?>/web/assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed " >
<!-- BEGIN BASE--><?php
$_SESSION["VISIT_user"] = $_SERVER['REMOTE_ADDR']
?>
<div id="base">
    <header>
        <div style="margin-right: 10%" class="text-lg text-right"><span class="text-bold">TU</span> DIRECCION <span class="text-bold">IP</span> es: <span class=""><?php $ip= gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR']) );
        echo $ip ;?></span></div>
        <br/><br/>
        <div class="text-center" style="margin-top: -50px; position: relative">
            <h2 style="position: relative">Atención a Usuarios
                <br/><span style="" class="text-bold">Levantar reporte o Solicitud</span>
            </h2>
        </div>
    </header>
    <!-- BEGIN CONTENT-->
    <div id="contentV2">    
        <section ng-controller="EquiposController as equipos">
            <div class="section-body contain-lg" ng-controller="formsController as forms">
                <div class="row text-center">
                    <p>Elige el equipo que deseas reportar:</p>
                    <center>
                    <div style="width: 35%;">
                        <ul class="nav nav-pills">
                            <li ng-class="{active:forms.isSelected(1)}"><button class="btn btn-raised ink-reaction btn-default-light" ng-click="forms.selectTab1()" id="tab1" type="submit">REPORTAR MI EQUIPO</button></li>
                            <li ng-class="{active:forms.isSelected(2)}"><button class="btn ink-reaction btn-default-dark" ng-click="forms.selectTab2()" id="tab2">REPORTAR OTRO EQUIPO</button></li>
                        </ul>
                    </div>
                    </center>
                </div>
                <br/>

                <!--Inicia Reportar mi Equipo-->
                <div class="row">
                    <div id="form1">
                        <br/>
                        <div>
                            <form method="post" class="form" name="datosForm" id="datosForm" ng-init="forms.init()">
                                <div class="col-sm-6">
                                    <div class="form-group" ng-controller="UnidadesController as Ctrl_U">
                                        {{nombre}}
                                        <input type="text" name="unidades" ng-click="Ctrl_U.getListaUnidades();" ng-model="forms.consulta.data.unidad" class="auto form-control ng-dirty ng-invalid ng-valid" typeahead-editable="false" typeahead="unidad.nombre for unidad in unidad | filter:$viewValue | limitTo:10" required />
                                        <label for=""><span class="text-danger">* </span>Unidad</label>
                                    </div>
                                    <div class="form-group" ng-controller="AreaController">
                                        <input type="text" name="areas" ng-model="forms.consulta.data.AREA" ng-class="{'floating-label': equipos.equipo.data.areas}" typeahead-editable="false" typeahead="area.nombre for area in area | filter:$viewValue | limitTo:10" class="form-control ng-dirty ng-invalid ng-valid" required/>
                                        <label for=""><span class="text-danger">* </span>Área</label>
                                    </div>
                                    <div class="form-group" ng-controller="TipoController">
                                        <input type="text" name="tipo" ng-model="forms.consulta.data.Tipo" ng-class="{'floating-label': !equipos.equipo.data.tipo}"  typeahead-editable="false" typeahead="tipo.descripcion for tipo in tipo | filter:$viewValue | limitTo:10" class="form-control ng-dirty ng-invalid ng-valid" required/>
                                        <label for=""><span class="text-danger">* </span>Tipo</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group " ng-controller="marcaController">
                                        <input type="text" name="marca" ng-model="forms.consulta.data.marca" class="form-control ng-dirty ng-invalid ng-valid" typeahead-editable="false" typeahead="marca.descripcion for marca in marca | filter:$viewValue | limitTo:10" required />
                                        <label for=""><span class="text-danger">* </span>Marca</label>
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" name="modelo" ng-model="forms.consulta.data.SMODEL" class="form-control ng-dirty ng-invalid ng-valid"  required disabled/>
                                        <label for=""><span class="text-danger">* </span>Modelo</label>
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" name="serie" ng-model="forms.consulta.data.ASSETTAG" class="form-control ng-dirty ng-invalid ng-valid"  required/>
                                        <label for=""><span class="text-danger">* </span>Número de Serie</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <input type="text" name="usuario" id="help1" ng-model="forms.consulta.data.USERID" class="form-control ng-dirty ng-invalid ng-valid" required/>
                                        <label for=""><span class="text-danger">* </span>Usuario</label>
                                    </div>
                                    <div class="form-group ">
                                        <input type="password" name="usuario_pw" ng-model="forms.consulta.data.passUser" id="help1" class="form-control ng-dirty ng-invalid ng-valid"/>
                                        <label for="">Contraseña</label>
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" name="telefono" id="help1" ng-model="forms.consulta.data.telefono" class="form-control ng-dirty ng-invalid ng-valid" required/>
                                        <label for=""><span class="text-danger">* </span>Telefono</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <input type="email" name="correo" id="help1" ng-model="forms.consulta.data.correo" class="form-control ng-dirty ng-invalid ng-valid" />
                                        <label for="">Correo</label>
                                    </div>
                                    <div class="form-group ">
                                        <input type="password" name="correo_pw" id="help1" ng-model="forms.consulta.data.passCorreo" class="form-control ng-dirty ng-invalid ng-valid" />
                                        <label for="">Contraseña Correo</label>
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" name="extension" id="help1" ng-model="forms.consulta.data.extencion" class="form-control ng-dirty ng-invalid ng-valid" />
                                        <label for="">Extensión</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <input type="text" name="persona_reporta" id="help1" ng-model="forms.consulta.data.Qreporta" class="form-control ng-dirty ng-invalid ng-valid" required/>
                                        <label for=""><span class="text-danger">* </span>¿Quien Reporta?</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="problema" ng-model="forms.consulta.data.problema" class="form-control ng-dirty ng-invalid ng-valid" required>
<!--                                        <option>SE APAGA</option>-->
                                            <option value="" class="problema_def" selected>--------------------------------------------------------------------------------</option>
                                            <option class="problema_def">TIENE VIRUS</option>
    <!--                                        <option>NO INICIA SESION</option>-->
                                            <option class="problema_def">NO SIRVE EL CD</option>
                                            <option class="problema_def">PROBLEMA OFFICE</option>
    <!--                                        <option>FALLA LYNC</option>-->
    <!--                                        <option>NO ENCIENDE</option>-->
    <!--                                        <option>ALARMADA(FOCO ROJO)</option>-->
    <!--                                        <option>NO TIENE RED</option>-->
    <!--                                        <option>SE CONGELA LA IMAGEN</option>-->
                                            <option value="" ng-click="forms.click_Otro()">Otro</option>
                                        </select>
                                        <textarea name="problema" id="otro" cols="30" rows="2" ng-model="forms.consulta.data.problema"  class="form-control ng-dirty ng-invalid ng-valid" required placeholder="Describa su problema" ></textarea>
                                        <label for=""><span class="text-danger">* </span> Problema</label>
                                    </div>
                                        <div class="form-group">
                                            <input type="hidden" name="ipcaptura" id="help1" ng-model="forms.equipo.data.IPADDRESS"/>
                                        </div>
                                </div>
                                <br/>
                                <div class="text-center col-sm-12">
                                    &nbsp;&nbsp; <button type="submit" class="btn btn-raised ink-reaction btn-default-dark">Guardar</button>
                                </div>
                            </form>
                            <br><br><br>
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" type='button' ng-click='on_click_cancel()'>×</button>
                                            <h4 class="modal-title"> <h3>Reporte guardado con éxito</h3></h4>
                                            <h5>Generando folio .......</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!--Termina Reportar mi Equipo-->
                    <div id="form2">
<!--                    <div class="col-lg-12">

                        <form  action="" accept-charset="utf-8" method="post" id="formequiposip"  ng-init="equipos.init()">
                        <div class="col-lg-12"><span class="text-light text-lg">Si conoces la direccion IP del equipo que deseas reportar escribela aquí: &nbsp;&nbsp;</span>
                        <input type="text" class="form" name="buscar"/> <span class="text-light text-lg">&nbsp; y haz click en </span>&nbsp;&nbsp;&nbsp;<button class="btn btn-raised ink-reaction btn-primary" type="submit">LLENAR DATOS</button><span class="text-light text-lg">
                        Sino llena los campos</span>

                        </form>
                    </div>-->
                        <p class="text-light text-lg">Llena los campos del equipo que deseas reportar</p>
                        <br/>

                        <div ng-controller="form2Controller as Ctrl" class="col-lg-12">
                            <form name="Form" class="form" id="datosFormAutocomplete" ng-init="Ctrl.init()">
                                <div class="col-sm-6">

                                    <div class="form-group" ng-controller="UnidadesController">
                                        <script type="text/ng-template" id="customTemplate.html">
                                            <a>
                                                <i>({{match.model.unidad}})</i>
                                            </a>
                                        </script>
                                        <input type="text" name="unidades"  ng-model="Ctrl.equipo.data.unidad" typeahead-editable="false" typeahead="unidad.nombre for unidad in unidad | filter:$viewValue | limitTo:10" class="form-control Sip ng-dirty ng-invalid ng-valid " required=""/>
                                        <label for=""><span class="text-danger">* </span> Unidad</label>
                                    </div>
                                    <div class="form-group" ng-controller="AreaController">
                                        <script type="text/ng-template" id="customTemplate.html">
                                            <a>
                                                <i>({{match.model.nombre}})</i>
                                            </a>
                                        </script>
                                        <input type="text" name="areas" ng-model="Ctrl.equipo.data.AREA" ng-class="{'floating-label': equipos.equipo.data.areas}" typeahead-editable="false" typeahead="area.nombre for area in area | filter:$viewValue | limitTo:10" class="form-control Sip ng-dirty ng-invalid ng-valid" required=""/>
                                        <label for=""><span class="text-danger">* </span> Área</label>
                                    </div>
                                    <div class="form-group" ng-controller="TipoController">
                                        <script type="text/ng-template" id="customTemplate.html">
                                            <a>
                                                <i>({{match.model.descripcion}})</i>
                                            </a>
                                        </script>
                                        <input type="text" name="tipo" ng-class="{'floating-label': !equipos.equipo.data.tipo}" ng-model="Ctrl.equipo.data.Tipo" typeahead-editable="false" typeahead="tipo.descripcion for tipo in tipo | filter:$viewValue | limitTo:10"  class="form-control Sip ng-dirty ng-invalid ng-valid" required=""/>
                                        <label for=""><span class="text-danger">* </span> Tipo</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" ng-controller="marcaController">
                                        <script type="text/ng-template" id="customTemplate.html">
                                            <a>
                                                <i>({{match.model.descripcion}})</i>
                                            </a>
                                        </script>
                                        <input type="text" name="marca" ng-class="{'floating-label': !equipos.equipo.data.marca}" ng-model="Ctrl.equipo.data.marca" typeahead-editable="false" typeahead="marca.descripcion for marca in marca | filter:$viewValue | limitTo:10" class="form-control  Sip ng-dirty ng-invalid ng-valid" required=""/>
                                        <label for=""><span class="text-danger">* </span> Marca</label>
                                    </div>
                                    <div class="form-group" >
                                        <input type="text" name="modelo" ng-class="{'floating-label': !equipos.equipo.data.modelo}" ng-model="Ctrl.equipo.data.SMODEL" typeahead-editable="false" class="form-control  Sip ng-dirty ng-invalid ng-valid" />
                                        <label for=""> Modelo</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="serie" ng-model="Ctrl.equipo.data.ASSETTAG" ng-class="{'floating-label': !equipos.equipo.data.ASSETTAG}" class="form-control  Sip ng-dirty ng-invalid ng-valid" />
                                        <label for=""> Número de Serie</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="usuario" id="help1" class="form-control ng-dirty ng-invalid ng-valid" ng-model="Ctrl.equipo.data.USERID" required/>
                                        <label for=""><span class="text-danger">* </span>Usuario</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="usuario_pw" id="help1" class="form-control ng-dirty ng-invalid ng-valid" ng-model="Ctrl.equipo.data.passUSer" />
                                        <label for="">Contraseña</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="telefono" id="help1" class="form-control ng-dirty ng-invalid ng-valid" ng-model="Ctrl.equipo.data.telefono" required/>
                                        <label for=""><span class="text-danger">* </span>Telefono</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="email" name="correo" id="help1" class="form-control ng-dirty ng-invalid ng-valid" ng-model="Ctrl.equipo.data.correo"/>
                                        <label for="">Correo</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="correo_pw" id="help1" class="form-control ng-dirty ng-invalid ng-valid" ng-model="Ctrl.equipo.data.passCorreo"/>
                                        <label for="">Contraseña Correo</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="extension" id="help1" class="form-control ng-dirty ng-invalid ng-valid" ng-model="Ctrl.equipo.data.extencion"/>
                                        <label for="">Extensión</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="persona_reporta" id="help1" class="form-control ng-dirty ng-invalid ng-valid" ng-model="Ctrl.equipo.data.Qreporta" required/>
                                        <label for=""><span class="text-danger">* </span>¿Quien Reporta?</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="problema" ng-model="Ctrl.equipo.data.problema" class="form-control ng-dirty ng-invalid ng-valid" required>
                                            <option value="" class="problema_def" selected>--------------------------------------------------------------------------------</option>
                                            <option class="problema_def">SE APAGA</option>
                                            <option class="problema_def">TIENE VIRUS</option>
                                            <option class="problema_def">NO INICIA SESION</option>
                                            <option class="problema_def">NO SIRVE EL CD</option>
                                            <option class="problema_def">PROBLEMA OFFICE</option>
                                            <option class="problema_def">FALLA LYNC</option>
                                            <option class="problema_def">NO ENCIENDE</option>
                                            <option class="problema_def">ALARMADA(FOCO ROJO)</option>
                                            <option class="problema_def">NO TIENE RED</option>
                                            <option class="problema_def">SE CONGELA LA IMAGEN</option>
                                            <option value="" ng-click="Ctrl.click_Otro2()">OTRO</option>
                                        </select>
                                        <textarea name="problema" ng-model="Ctrl.equipo.data.problema" id="otro2" cols="30" rows="2"  class="form-control ng-dirty ng-invalid ng-valid" placeholder="Describa su problema" ></textarea>
                                        <label for=""><span class="text-danger">* </span>Problema</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="ipcaptura" id="help1" ng-model="Ctrl.equipo.data.IPADDRESS"/>
                                    </div>
                                </div>
                                <br/>
                                <div class="col-lg-12 text-center">
                                    <input type="reset" class="btn btn-raised ink-reaction btn-default-light" value="Cancelar"/>
                                    &nbsp;&nbsp; <input type="submit" class="btn btn-raised ink-reaction btn-default-dark" value="Guardar"/>
                                    <p class="text-light text-lg">Los campos marcados con <span class="text-danger">* </span>son de carácter obligatorio.</p>

                                </div>
                            </form>
                            <div id="myModal2" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" type='button' ng-click='on_click_cancel2()'>×</button>
                                            <h4 class="modal-title"> <h3>Reporte guardado con éxito</h4>
                                            <h5>Generando folio ........</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!--end .section-body -->
        </section>
        <!-- END 404 MESSAGE -->

    </div><!--end #content-->
    <!-- END CONTENT -->

</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/localization/messages_es.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/App.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppNavigation.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppCard.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppForm.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppNavSearch.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppVendor.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/demo/Demo.js"></script>
<!-- END JAVASCRIPT -->
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-route.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-resource.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-datatables.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/css/theme-default/libs/ui-bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/unidades/unidades.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/tipo/tipo.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/modelo/modelo.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/marca/marca.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/area/area.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/menu/menu.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/equiposoffline/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/equiposoffline/provider.js"></script>


</body>
</html>
