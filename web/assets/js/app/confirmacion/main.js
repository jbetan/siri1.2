/**
 * Created by Brayan on 07/01/2016.
 */
$(document).ready(function(){
// ========= METODO PARA RECOGER EL ID POR GET ========= //
    $.ajaxSetup({ cache:false });
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
    // =========== FIN METODO ========
    var parametro = $.getURLParam("id");
    $.ajax({
        url: "confirmacionModel?id="+ parametro,
        type: 'POST',
        data: 'send=id',
        dataType: 'json',
        async: true,
    cache:false,
        success: function(data){
            //console.log(data);
            if(data[0] == "NULL"){
                $("#ip").val("---.---.---.---");
            }else{
                $("#ip").val(           data[0]);
            }
            $("#fecha").val(        data[1]);
            $("#folio").html(       data[2]);
            $("#problema").val(     data[3]);
            $("#unidad").val(       data[4]);
            $("#area").val(         data[5]);
            $("#modelo").val(       data[6]);
            $("#Nserie").val(       data[7]);
            $("#tipo").val(         data[8]);
            $("#marca").val(        data[9]);
            $("#user_report").val(  data[10]);
            //console.log(            data[0]);
        }

    });
    $("#imprimir").click(function(){
        window.print();
        return false;
    })
});