$(function(){

    $("#btn-check-forecast").click(function(){
        $("#forecast-modal").modal("show");
    });

    $("#btn-get-forecast").click(function(){
        formData = $("#forecast-form").serializeArray();
        $.ajax({
            dataType : "json",
            type : "GET",
            url : "/forecast/get-forecast",
            data : formData
            ,beforeSend : function(){

            },success : function(data){
                console.log(data);
            }
        });

    });







});
