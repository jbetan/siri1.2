/**
 * Created by Brayan on 04/01/2016.
 */
$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    // ====== AUTOCOMPLETE'S ===== //
    $.ajax({
        url: "catalogoUnidad",
        type: 'POST',
        data: 'send=unidad',
        dataType: 'json',
        async: true,
        success: function(data){            //unidad
            $('.unidades').typeahead({
                source: data,
                display: 'nombre',
                val: 'id'
            });
        }

    });
    $.ajax({
        url: "catalogoUnidad",
        type: 'POST',
        data: 'send=tipo',
        dataType: 'json',
        async: true,
        success: function(data){            //tipo
            $('.tipo').typeahead({
                source: data,
                display: 'descripcion',
                val: 'id'
            });
        }

    });
    $.ajax({
        url: "catalogoUnidad",
        type: 'POST',
        data: 'send=marca',
        dataType: 'json',
        async: true,
        success: function(data){            //marca
            var cont=0;
            for(i in data){
                cont++;
            }
            $('.marca').typeahead({
                source: data,
                display: 'descripcion',
                val: 'id'
            });

        }

    });
    // ========= FORM 2 =============== //

    $.ajax({
        url: "catalogoUnidad",
        type: 'POST',
        data: 'send=unidad',
        dataType: 'json',
        async: true,
        success: function(data){            //unidad
            $('.unidades2').typeahead({
                source: data,
                display: 'nombre',
                val: 'id'
            });
        }

    });
    $.ajax({
        url: "catalogoUnidad",
        type: 'POST',
        data: 'send=tipo',
        dataType: 'json',
        async: true,
        success: function(data){            //tipo
            $('.tipo2').typeahead({
                source: data,
                display: 'descripcion',
                val: 'id'
            });
        }

    });
    $.ajax({
        url: "catalogoUnidad",
        type: 'POST',
        data: 'send=marca',
        dataType: 'json',
        async: true,
        success: function(data){            //marca
            var cont=0;
            for(i in data){
                cont++;
            }
            $('.marca2').typeahead({
                source: data,
                display: 'descripcion',
                val: 'id'
            });

        }

    });

    // ===== VERIFICAR SI ES OCS ===== //
    $.ajax({
        url: "ocs",
        type: 'POST',
        data: 'send=datos',                 // Data OCS
        dataType: 'json',
        async: true,
        success: function(data){
            console.log(data);
            console.log(data.SSN);
            $("#modelo").val(data.SMODEL);
            $("#nserie").val(data.SSN);
            $("#usuario").val(data.USERID);
            $("#ipcaptura").val(data.IPADDRESS);
        }

    });

    // ========== TAB'S =========//
    $("#form2").css("display", "none");
    $("#tab1").click(function(){
        $("#form1").show();
        $("#form2").css("display", "none");
    });
    $("#tab2").click(function(){
        $("#form1").css("display", "none");
        $("#form2").show();
        $("#datosForm2")[0].reset();
    });

    // ========= SELECT 'OTRO' ======= //

    $(".otro").css("display", "none");

    $(".select_problem").change(function(){
        if($("select.select_problem").val() == "otro"){
            $(".otro").css("display", "block");
        }else{
            $(".otro").css("display", "none");
            $(".otro").val("");
        }
    });

    $(".otro2").css("display", "none");

    $(".select_problem2").change(function(){
        if($(".select_problem2").val() == "otro"){
            $(".otro2").css("display", "block");
        }else{
            $(".otro2").css("display", "none");
            $(".otro2").val("");
        }
    });

    //========== Desenmascarar contraseñas ==============

    $('#eye').click(function(){
        var name = $('#passUSER').attr('name');
        var value = $('#passUSER').val();
        var ngModel = $('#passUSER').attr('ng-model');
        setTimeout(function(){
            var html = '<input type="password" name="'+ name +'" id="passUSER" value="'+ value +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
            $('#passUSER').after(html).remove();
        },1000);
        var html = '<input type="text" name="'+ name +'" id="passUSER" value="'+ value +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
        $('#passUSER').after(html).remove();

    });

    $('#eyetwo').click(function(){
        var name1 = $('#passEMAIL').attr('name');
        var value1 = $('#passEMAIL').val();
        var ngModel1 = $('#passEMAIL').attr('ng-model');
        setTimeout(function(){
            var html = '<input type="password" name="'+ name1 +'" id="passEMAIL" value="'+ value1 +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
            $('#passEMAIL').after(html).remove();
        },1000);
        var html = '<input type="text" name="'+ name1 +'" id="passEMAIL" value="'+ value1 +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
        $('#passEMAIL').after(html).remove();

    });
    $('#eye2').click(function(){
        var name = $('#passUSER2').attr('name');
        var value = $('#passUSER2').val();
        var ngModel = $('#passUSER2').attr('ng-model');
        setTimeout(function(){
            var html = '<input type="password" name="'+ name +'" id="passUSER2" value="'+ value +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
            $('#passUSER2').after(html).remove();
        },1000);
        var html = '<input type="text" name="'+ name +'" id="passUSER2" value="'+ value +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
        $('#passUSER2').after(html).remove();

    });

    $('#eyetwo2').click(function(){
        var name1 = $('#passEMAIL2').attr('name');
        var value1 = $('#passEMAIL2').val();
        var ngModel1 = $('#passEMAIL2').attr('ng-model');
        setTimeout(function(){
            var html = '<input type="password" name="'+ name1 +'" id="passEMAIL2" value="'+ value1 +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
            $('#passEMAIL2').after(html).remove();
        },1000);
        var html = '<input type="text" name="'+ name1 +'" id="passEMAIL2" value="'+ value1 +'" class="form-control ng-dirty ng-invalid ng-valid"/>';
        $('#passEMAIL2').after(html).remove();

    });

    //======================= SAVE ======================= //
     $("#save").click(function(e){
         e.preventDefault();
         if($("select.select_problem").val() == "otro"){
             var otro_dato = $(".otro").val();
             $(".option_otro").val(otro_dato);
         }
         var datas = $("#datosForm").serialize();
        $.ajax({
            url: "verReporte?action=save",
            type: 'POST',
            data: datas,
            dataType: 'json',
            async: true,
            success: function(data){
                for(var i in data){
                    if(!data.id){
                        if(
                            typeof(data[i].unidad) != "undefined unidad"            ||
                            typeof(data[i].tipo) != "undefined tipo"                ||
                            typeof(data[i].marca) != "undefined marca"              ||
                            data[i].areas != "undefined areas"                      ||
                            data[i].usuario != "undefined usuario"                  ||
                            data[i].telefono != "undefined telefono"                ||
                            data[i].persona_reporta != "undefined persona_reporta"  ||
                            data[i].problema_select != "undefined problema_select"
                        )

                        {
                            if(data[i].unidad == "undefined unidad"){
                                $(".unidades").css("border", "2px #EBCCD1 solid");
                                $(".unidades").css("border-bottom", "3px #F44336 solid");
                                $(".error").css("display", "block");
                                $(".unidades").keydown(function () {
                                    $(".error").fadeOut();
                                    $(".unidades").css("border", "0");
                                })
                            }
                            if(data[i].tipo == "undefined tipo"){
                                $(".tipo").css("border", "2px #EBCCD1 solid");
                                $(".tipo").css("border-bottom", "3px #F44336 solid");
                                $(".error2").css("display", "block");
                                $(".tipo").keydown(function () {
                                    $(".error2").fadeOut();
                                    $(".tipo").css("border", "0");
                                })
                            }
                            if(data[i].marca == "undefined marca"){
                                $(".marca").css("border", "2px #EBCCD1 solid");
                                $(".marca").css("border-bottom", "3px #F44336 solid");
                                $(".error3").css("display", "block");
                                $(".marca").keydown(function () {
                                    $(".error3").fadeOut();
                                    $(".marca").css("border", "0");
                                });
                            }
                            // ========== FORM ERRORS =========
                            if(data[i].areas == "undefined areas"){
                                $(".areas").css("border", "2px #EBCCD1 solid");
                                $(".areas").css("border-bottom", "3px #F44336 solid");
                                $(".error4").css("display", "block");
                                $(".areas").keydown(function () {
                                    $(".error4").fadeOut();
                                    $(".areas").css("border", "0");
                                });
                            }
                            if(data[i].usuario == "undefined usuario"){
                                $(".usuario").css("border", "2px #EBCCD1 solid");
                                $(".usuario").css("border-bottom", "3px #F44336 solid");
                                $(".error5").css("display", "block");
                                $(".usuario").keydown(function () {
                                    $(".error5").fadeOut();
                                    $(".usuario").css("border", "0");
                                });
                            }
                            if(data[i].telefono == "undefined telefono"){
                                $(".telefono").css("border", "2px #EBCCD1 solid");
                                $(".telefono").css("border-bottom", "3px #F44336 solid");
                                $(".error6").css("display", "block");
                                $(".telefono").keydown(function () {
                                    $(".error6").fadeOut();
                                    $(".telefono").css("border", "0");
                                });
                            }
                            if(data[i].persona_reporta == "undefined persona_reporta"){
                                $(".persona_reporta").css("border", "2px #EBCCD1 solid");
                                $(".persona_reporta").css("border-bottom", "3px #F44336 solid");
                                $(".error7").css("display", "block");
                                $(".persona_reporta").keydown(function () {
                                    $(".error7").fadeOut();
                                    $(".persona_reporta").css("border", "0");
                                });
                            }
                            if(data[i].problema_select == "undefined problema_select"){
                                $(".problema_select").css("border", "2px #EBCCD1 solid");
                                $(".problema_select").css("border-bottom", "3px #F44336 solid");
                                $(".error8").css("display", "block");
                                $(".problema_select").change(function () {
                                    $(".error8").fadeOut();
                                    $(".problema_select").css("border", "0");
                                });
                            }
                        }
                    }else{
                        console.log(data.id);
                        var id = data.id;
                        $('#myModal').modal('show');
                        setTimeout(function () {
                            location.href = ('confirmacion?id='+id);
                            //console.log(data);
                        }, 2000);
                    }

                }

            }

        });
    });

    $("#save2").click(function(e){
        e.preventDefault();
        if($("select.select_problem2").val() == "otro"){
            var otro_dato = $(".otro2").val();
            $(".option_otro2").val(otro_dato);
        }
        var datas = $("#datosForm2").serialize();
        $.ajax({
            url: "verReporte?action=save",
            type: 'POST',
            data: datas,
            dataType: 'json',
            async: true,
            success: function(data){
                for(var i in data){
                    if(!data.id){
                        if(
                            typeof(data[i].unidad) != "undefined unidad"            ||
                            typeof(data[i].tipo) != "undefined tipo"                ||
                            typeof(data[i].marca) != "undefined marca"              ||
                            data[i].areas != "undefined areas"                      ||
                            data[i].usuario != "undefined usuario"                  ||
                            data[i].telefono != "undefined telefono"                ||
                            data[i].persona_reporta != "undefined persona_reporta"  ||
                            data[i].problema_select != "undefined problema_select"
                        ){
                            if(data[i].unidad == "undefined unidad"){
                                $(".unidades2").css("border", "2px #EBCCD1 solid");
                                $(".unidades2").css("border-bottom", "3px #F44336 solid");
                                $(".error9").css("display", "block");
                                $(".unidades2").keydown(function () {
                                    $(".error9").fadeOut();
                                    $(".unidades2").css("border", "0");
                                })
                            }
                            if(data[i].tipo == "undefined tipo"){
                                $(".tipo2").css("border", "2px #EBCCD1 solid");
                                $(".tipo2").css("border-bottom", "3px #F44336 solid");
                                $(".error10").css("display", "block");
                                $(".tipo2").keydown(function () {
                                    $(".error10").fadeOut();
                                    $(".tipo2").css("border", "0");
                                })
                            }
                            if(data[i].marca == "undefined marca"){
                                $(".marca2").css("border", "2px #EBCCD1 solid");
                                $(".marca2").css("border-bottom", "3px #F44336 solid");
                                $(".error11").css("display", "block");
                                $(".marca2").keydown(function () {
                                    $(".error11").fadeOut();
                                    $(".marca2").css("border", "0");
                                })
                            }
                            // ========== FORM ERRORS =========
                            if(data[i].areas == "undefined areas"){
                                $(".areas2").css("border", "2px #EBCCD1 solid");
                                $(".areas2").css("border-bottom", "3px #F44336 solid");
                                $(".error12").css("display", "block");
                                $(".areas2").keydown(function () {
                                    $(".error12").fadeOut();
                                    $(".areas2").css("border", "0");
                                });
                            }
                            if(data[i].usuario == "undefined usuario"){
                                $(".usuario2").css("border", "2px #EBCCD1 solid");
                                $(".usuario2").css("border-bottom", "3px #F44336 solid");
                                $(".error13").css("display", "block");
                                $(".usuario2").keydown(function () {
                                    $(".error13").fadeOut();
                                    $(".usuario2").css("border", "0");
                                });
                            }
                            if(data[i].telefono == "undefined telefono"){
                                $(".telefono2").css("border", "2px #EBCCD1 solid");
                                $(".telefono2").css("border-bottom", "3px #F44336 solid");
                                $(".error14").css("display", "block");
                                $(".telefono2").keydown(function () {
                                    $(".error14").fadeOut();
                                    $(".telefono2").css("border", "0");
                                });
                            }
                            if(data[i].persona_reporta == "undefined persona_reporta"){
                                $(".persona_reporta2").css("border", "2px #EBCCD1 solid");
                                $(".persona_reporta2").css("border-bottom", "3px #F44336 solid");
                                $(".error15").css("display", "block");
                                $(".persona_reporta2").keydown(function () {
                                    $(".error15").fadeOut();
                                    $(".persona_reporta2").css("border", "0");
                                });
                            }
                            if(data[i].problema_select == "undefined problema_select"){
                                $(".problema_select2").css("border", "2px #EBCCD1 solid");
                                $(".problema_select2").css("border-bottom", "3px #F44336 solid");
                                $(".error16").css("display", "block");
                                $(".problema_select2").keydown(function () {
                                    $(".error16").fadeOut();
                                    $(".problema_select2").css("border", "0");
                                });
                            }
                        }
                    }else{
                        console.log(data.id);
                        var id = data.id;
                        //alert(id);
                        $('#myModal2').modal('show');
                        setTimeout(function () {
                            location.href = ('confirmacion?id='+id);
                            //console.log(data);
                        }, 2000);
                    }
                }

            }

        });
    })

});