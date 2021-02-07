$(function(){
    if(0 != 1){
        $("#buttonRegistro").prop('disabled', true);
    }

    $("#nameuser").on("keyup", function(e){
        if($("#nameuser").val() != "" && $("#emailuser").val() != "" && $("#password").val() != ""){
            $("#buttonRegistro").prop('disabled', false);
        }else{
            $("#buttonRegistro").prop('disabled', true);
        }
    });

    $("#password").on("keyup", function(){
        if($("#nameuser").val() != "" && $("#emailuser").val() != "" && $("#password").val() != ""){
            $("#buttonRegistro").prop('disabled', false);
        }else{
            $("#buttonRegistro").prop('disabled', true);
        }
    });

    $("#emailuser").on("keyup", function(){
        if($("#nameuser").val() != "" && $("#emailuser").val() != "" && $("#password").val() != ""){
            $("#buttonRegistro").prop('disabled', false);
        }else{
            $("#buttonRegistro").prop('disabled', true);
        }
    });
});