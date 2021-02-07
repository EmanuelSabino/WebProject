$(function(){
    $("#description").css("display", "none");
    $("#paragrafoPrice").css("display", "none");

    $("#imgagine").on("click", function(e){
        $(e.target).css("display", "none");
        $("#description").css("display", "block");
    });

    $("#description").on("click", function(e){
        $(e.target).css("display", "none");
        $("#imgagine").css("display", "block");
    });

    $("#price").hover(
        function(){
            $("#paragrafoPrice").css("display", "block");
        }
    );

    $("#price").mouseout(
        function(){
            $("#paragrafoPrice").css("display", "none");
            $("#paragrafoPrice").css("line-height", "0.1");
        }
    );



});