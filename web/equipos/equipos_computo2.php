<!DOCTYPE html>
<html lang="en">
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
    <style>.typeahead{width: 100%}</style>
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
        <div class="text-center" style="margin-top: -50px; position: relative"><h2 style="position: relative">Atención a Usuarios
                <br/><span style="" class="text-bold">Levantar reporte o Solicitud</span></h2></div>
    </header>
    <!-- BEGIN CONTENT-->
    <div id="contentV2">
        <section>
            <div class="section-body contain-lg">

                <br/>

                <!--Inicia Reportar mi Equipo-->
                <div class="row">
                    <p class="text-light text-lg">Llena los campos del equipo que deseas reportar</p>
                    <br/>

                    <div class="col-lg-12">
                        <form name="Form" class="form" id="datosForm2">
                            <div class="col-sm-6">
                                <div class="form-group"style="position: relative">
                                    <style>.error9{display:none}</style>
                                    <input type="text" autocomplete="off" name="unidades" class="unidades2 form-control ng-dirty ng-invalid ng-valid" required />
                                    <label for=""><span class="text-danger">* </span>Unidad</label>
                                    <span class="error9 text-danger" style="position:absolute;">Debes seleccionar una unidad de la lista desplegada</span>
                                </div>
                                <div class="form-group" style="position: relative">
                                    <style>.error12{display:none}</style>
                                    <input type="text" name="areas" class="areas2 form-control ng-dirty ng-invalid ng-valid" required/>
                                    <label for=""><span class="text-danger">* </span>Área</label>
                                    <span class="error12 text-danger" style="position:absolute;">favor de llenar el campo vacio</span>

                                </div>
                                <div class="form-group" style="position: relative">
                                    <style>.error10{display:none}</style>
                                    <input type="text" name="tipo" autocomplete="off" class="tipo2 form-control ng-dirty ng-invalid ng-valid" required/>
                                    <label for=""><span class="text-danger">* </span>Tipo de equipo</label>
                                    <span class="error10 text-danger" style="position:absolute;">Debes seleccionar un tipo de equipo de la lista desplegada</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group " style="position: relative">
                                    <style>.error11{display:none}</style>
                                    <input type="text" name="marca" autocomplete="off" class="form-control marca2 ng-dirty ng-invalid ng-valid" required />
                                    <label for=""><span class="text-danger">* </span>Marca</label>
                                    <span class="error11 text-danger" style="position:absolute;">Debes seleccionar una marca de equipo de la lista desplegada</span>
                                </div>
                                <div class="form-group" >
                                    <input type="text" name="modelo" id="" class="form-control  Sip ng-dirty ng-invalid ng-valid" required/>
                                    <label for=""><span class="text-danger">* </span> Modelo</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="serie" id="" class="form-control  Sip ng-dirty ng-invalid ng-valid" required/>
                                    <label for=""><span class="text-danger">* </span> Número de Serie</label>
                                </div>
                            </div>
                            <div class="col-sm-4" style="position: relative">
                                <div class="form-group">
                                    <style>.error13{display:none}</style>
                                    <input type="text" name="usuario" id="" class="usuario2 form-control ng-dirty ng-invalid ng-valid" required/>
                                    <label for=""><span class="text-danger">* </span>Usuario</label>
                                    <span class="error13 text-danger" style="position:absolute;">favor de llenar el campo vacio</span>
                                </div>
                                <div class="form-group" style="position: relative;">
                                    <input type="password" name="usuario_pw" id="passUSER2" class="form-control ng-dirty ng-invalid ng-valid"/>
                                    <label for="">Contraseña</label>
                                    <span class="glyphicon glyphicon-eye-open text-right" style="position: absolute;right: 0;top: 30px;cursor: pointer " id="eye2" ></span>
                                </div>
                                <div class="form-group" style="position: relative">
                                    <style>.error14{display:none}</style>
                                    <input type="text" name="telefono" id="help1" class="telefono2 form-control ng-dirty ng-invalid ng-valid" required/>
                                    <label for=""><span class="text-danger">* </span>Telefono</label>
                                    <span class="error14 text-danger" style="position:absolute;">favor de llenar el campo vacio</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" name="correo" value="ejemplo@imss.mx" id="help1" class="form-control ng-dirty ng-invalid ng-valid"/>
                                    <label for="">Correo</label>
                                </div>
                                <div class="form-group" style="position: relative">
                                    <input type="password" name="correo_pw" id="passEMAIL2" class="form-control ng-dirty ng-invalid ng-valid"/>
                                    <label for="">Contraseña Correo</label>
                                    <span class="glyphicon glyphicon-eye-open text-right" style="position: absolute;right: 0;top: 30px;cursor: pointer " id="eyetwo2" ></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="extension" id="help1" class="form-control ng-dirty ng-invalid ng-valid"/>
                                    <label for="">Extensión</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="ipcaptura" id="help1" class="form-control ng-dirty ng-invalid ng-valid" />
                                    <label for="">Introduce el ip del equipo</label>
                                </div>
                                <div class="form-group" style="position: relative">
                                    <style>.error15{display:none}</style>
                                    <input type="text" name="persona_reporta" id="help1" class="persona_reporta2 form-control ng-dirty ng-invalid ng-valid" required/>
                                    <label for=""><span class="text-danger">* </span>¿Quien Reporta?</label>
                                    <span class="error15 text-danger" style="position:absolute;">favor de llenar el campo vacio</span>
                                </div>
                                <div class="form-group" style="position: relative">
                                    <style>.error16{display:none}</style>
                                    <select name="problema_select" class="select_problem2 problema_select2 form-control ng-dirty ng-invalid ng-valid" required>
                                        <option value="" selected>ELIGE UNO</option>
                                        <option value="SE APAGA">SE APAGA</option>
                                        <option value="PROBLEMA CON RH2000">PROBLEMA CON RH2000</option>
                                        <option value="TIENE VIRUS">TIENE VIRUS</option>
                                        <option value="NO INICIA SESION">NO INICIA SESION</option>
                                        <option value="NO SIRVE EL CD">NO SIRVE EL CD</option>
                                        <option value="PROBLEMA OFFICE">PROBLEMA OFFICE</option>
                                        <option value="FALLA LYNC">FALLA LYNC</option>
                                        <option value="NO ENCIENDE">NO ENCIENDE</option>
                                        <option value="ALARMADA(FOCO ROJO)">ALARMADA(FOCO ROJO)</option>
                                        <option value="NO TIENE RED">NO TIENE RED</option>
                                        <option value="SE CONGELA LA IMAGEN">SE CONGELA LA IMAGEN</option>
                                        <option value="otro" class="option_otro2">OTRO</option>
                                    </select>
                                    <textarea name="otro" id="otro2" cols="30" rows="2"  class="otro2 select_problem form-control ng-dirty ng-invalid ng-valid" placeholder="Describa su problema" ></textarea>
                                    <label for=""><span class="text-danger">* </span>Problema</label>
                                    <span class="error16 text-danger" style="position:absolute;">favor de seleccionar un problema</span>
                                </div>
                            </div>
                            <p class="text-light text-lg">Los campos marcados con <span class="text-danger">* </span>son de carácter obligatorio.</p>

                            <div class="col-lg-12 text-center">
                                <input type="reset" class="btn btn-raised ink-reaction btn-default-light" value="Cancelar"/>
                                &nbsp;&nbsp; <input type="button" class="btn btn-raised ink-reaction btn-default-dark" id="save2" value="Guardar"/>
                                &nbsp;&nbsp; <a href="login" class="btn btn-raised ink-reaction btn-primary-dark"><b><</b> Regresar</a>

                            </div>
                            <p></p>
                        </form>
                        <div id="myModal2" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type='button'>×</button>
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
<script src="<?=$this->contextPath?>/web/assets/js/libs/bootstrap_typeahead/bootstrap-typeahead.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/equiposoffline/main.js"></script>

</body>


</html>
