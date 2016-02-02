<!doctype html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <title>Consulta tu Equipo</title>

	 <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>

    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <!-- END STYLESHEETS -->
	
	<!-- librerias manuales-->
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/materialadmin.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/font-awesome.css" />

	
</head>
<body class="row">                 
   
    
	
	<div class="section-body"  >
        <div class="row">
            <div class="card panel" id="UnidadesCardForm">
                <div class="card-head card-head-sm collapsed style-primary-light" align="center" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-2">
                     <h3 >CONSULTA DE EQUIPO</h3>
                </div>

            </div>

        </div>
        <a class="btn btn-raised ink-reaction btn-warning" href="login">
            <b><</b>
            Regresar
        </a>
        <!-- BEGIN VALIDATION FORM WIZARD -->
        <div class="row" >
            <div class="col-lg-12">
                <form class="form" novalidate="novalidate" id="formFolio" name="formFolio">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group" >
                                  
                                    <input  style="font-size:20px; text-align:center "  name="folio"    id="folio" class="form-control" data-rule-minlength="2" required>
                                    <label for="folio" class="control-label">
                                       <i class="fa fa-tag"></i> Por favor, captura el folio del reporte
                                    </label>

                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                     
                                    <a id = "folio_bus" class="btn  btn-success ink-reaction"  > <i class="fa fa-search"></i>&nbsp;&nbsp;Buscar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
             <div >
        <div >
           
        <div class="row" >
            <div class="col-lg-12">
                <div class=" col-lg-12 center">
                    <table class="table table-bordered  no-margin table-hover" >
                        <thead>
                        <tr class="success">
                            <th>
                                <strong>
                                    <i class="fa fa-tag"></i>&nbsp;&nbsp; Folio 
                                </strong>
                            </th>
                            <th>
                                <strong>
                                    <i class="fa fa-heartbeat"></i>&nbsp;&nbsp;Estatus
                                 </strong>
                            </th>
                            <th>
                                <strong>
                                     <i class="fa fa-desktop"></i>&nbsp;&nbsp;Equipo
                                </strong>
                            </th>
                            <th>
                                <strong>
                                     <i class="fa fa-user"></i>&nbsp;&nbsp;Tecnico asignado
                                </strong>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td rowspan="4" style="font-size:50px; font-family: bold; text-align:center; vertical-align: middle;" id = "folio_rep">
                                
                            </td>
                            <td>Estatus:           <strong id = "status"        style = "font-weight:bold;"></strong></td>
                            <td>Tipo Equipo:       <strong id = "type_equiment" style = "font-weight:bold;"></strong></td>
                            <td>Asignado a:        <strong id = "tehnical"      style = "font-weight:bold;"></strong></td>
                        </tr>
                        <tr>
                            <td>Fecha de Recepción:<strong id = "date_start"    style = "font-weight:bold;"></strong></td>
                            <td>Marca:             <strong id = "marc"          style = "font-weight:bold;"></strong></td>
                            <td>Act. Realizada:    <strong id = "activity_uno"  style = "font-weight:bold;"></strong></td>

                        </tr>
                        <tr>
                            <td>Unidad:            <strong id = "unidad"        style = "font-weight:bold;"></strong></td>
                            <td>Modelo:            <strong id = "model"         style = "font-weight:bold;"></strong></td>
                            <td>Act. Realizada:    <strong id = "activity_dos"  style = "font-weight:bold;"></strong></td>

                        </tr>
                        <tr >
                            <td>Fecha de Término:  <strong id = "date_end"      style = "font-weight:bold;"></strong></td>
                            <td>Serie:             <strong id = "serie"         style = "font-weight:bold;"></strong></td>
                            <td>Act. Realizada:    <strong id = "activity_tres" style = "font-weight:bold;"></strong></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>            
    </div>
                 <div class="row">
                     <div class="card panel" id="UnidadesCardForm">
                         <div class="card-head card-head-sm collapsed style-primary-light" align="center" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-2">
                             <h3 >CONSULTA POR UNIDAD</h3>
                         </div>
                     </div>
                 </div>

                 <div class="row" >
                     <div class="col-lg-12">
                         <form class="form" novalidate="novalidate" id="formFolio" name="formFolio">
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-3">
                                         <div class="form-group" >

                                             <div class="form-group floating-label">
                                                 <select id="select2" class="form-control dirty" name="select2">
                                                     <option value=""> </option>
                                                     <option value="30">30</option>
                                                     <option value="40">40</option>
                                                     <option value="50">50</option>
                                                     <option value="60">60</option>
                                                     <option value="70">70</option>
                                                 </select>
                                                 <label for="select2"> <i class="fa fa-tag"></i> Seleciona el Nombre de una Unidad</label>
                                             </div>



                                         </div>
                                     </div>
                                     <div class="col-sm-2">
                                         <div class="form-group">

                                             <a id = "folio_bus" class="btn  btn-success ink-reaction"  > <i class="fa fa-search"></i>&nbsp;&nbsp;Buscar
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                         <div >
                             <div >


  
    <script src="./web/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    
    
    <script type="text/javascript">
        
    $( document ).ready(function(){ 

        $( "#folio_bus" ).on( "click", buscar_rep );

        function buscar_rep(){

         id = $('input:text[name=folio]').val();
            
             $.ajax({
                    type: "POST",
                    url: "entregaController?consulta=1&id="+id,
                    dataType: 'json',
                    success: function(response){
                        if (response.status == "OK") {
                            $('#folio_rep').text( response.folio );
                            $('#status').text( response.statusrep);
                            $('#type_equiment').text( response.descripcion );
                            $('#tehnical').text( "PENDIENTE" );
                            $('#date_start').text( response.finicio );
                            $('#marc').text( response.marca );
                            $('#serie').text( response.serie );
                            $('#unidad').text( response.unidad );
                            $('#model').text( response.modelo );

                            if ( response.actividad_uno == null) {
                                $('#activity_uno').text( "Sin Actividad" );
                            }else{
                                $('#activity_uno').text( response.actividad_uno );
                            }

                             if ( response.actividad_dos == null) {
                                 $('#activity_dos').text( "Sin Actividad" );
                            }else{
                                 $('#activity_dos').text( response.actividad_dos );
                            }                            

                             if ( response.actividad_tres == null) {
                                $('#activity_tres').text( "Sin Actividad" );
                            }else{
                                 $('#activity_tres').text( response.actividad_tres );
                            }                            

                            if ( response.ftermino == null) {
                                $('#date_end').text( "No Terminado" );
                            }else{
                               $('#date_end').text( response.ftermino );
                            }

                        }else{
                            
                            $('#folio_rep').text("");
                            $('#status').text( "");
                            $('#type_equiment').text( "" );
                            $('#tehnical').text( "" );
                            $('#date_start').text("" );
                            $('#marc').text( "" );
                            $('#serie').text( "" );
                            $('#unidad').text("" );
                            $('#model').text( "" );
                            $('#activity_uno').text( "" );
                            $('#activity_dos').text( "" );
                            $('#activity_tres').text( "" );
                            $('#date_end').text( "" );
                            alert(response.message);                            
                            
                        }
                    }
                });
            }
        });
         
    </script>
</body>
</html>