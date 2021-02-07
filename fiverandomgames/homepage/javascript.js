function mudaCor($elementoId){
    var a = document.getElementById($elementoId);

    var r = Math.floor(Math.random() * (255 - 0 + 1)) + 0;
    var p = Math.floor(Math.random() * (255 - 0 + 1)) + 0;
    var g = Math.floor(Math.random() * (255 - 0 + 1)) + 0;

    a.style.color="rgb(" + r + "," + g  + "," + p + ")";
}

function corOriginal($elementoId){
    var a = document.getElementById($elementoId);
    a.style.color="#2c4964";
}



function textoJustify($paragrafoSelect){
    var p = document.getElementById($paragrafoSelect);
    
    p.style.textAlign = "justify";
}

function textoOutJustify($paragrafoSelect){
    var p = document.getElementById($paragrafoSelect);

    p.style.textAlign = "center";
}