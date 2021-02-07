function verificarCampos(){
    var button = document.getElementById("loginButton");
    var email = document.getElementById("emailuser");
    var pass = document.getElementById("password");

    if(email.value.length == 0 || pass.value.length == 0){
        button.disabled = true;
    }else if(email.value.length != 0 && pass.value.length != 0){
        button.disabled = false;
    }
}


function verificarCamposADigitar(){
    var button = document.getElementById("loginButton");
    var email = document.getElementById("emailuser");
    var pass = document.getElementById("password");

    if(email.value.length != 0 && pass.value.length != 0){
        button.disabled = false;
    }else{
        button.disabled = true;
    }
}