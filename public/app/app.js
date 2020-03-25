

$(function(){

    /* init datatable */
    var forecastDTable = $('#forecast-table').DataTable( {
        dom: 'Bfrtip',
        columnDefs : [{"targets":0, "type":"date"}],
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'
        ]
    } );

    /* init btn modal show */
    $("#btn-check-forecast").click(function(){
        $("#forecast-modal").modal("show");
    });
     /* init btn forecast */
    $("#btn-get-forecast").click(function(){
        $("#forecast-modal").modal("hide");
        formData = $("#forecast-form").serializeArray();
        $.ajax({
            dataType : "json",
            type : "GET",
            url : "/forecast",
            data : formData
            ,beforeSend : function(){

                $("#forecast-table tbody").html("");
                $("#forecast-table-container").waitMe();

            },success : function(data){
                console.log(data);
                $("#forecast-table-container").waitMe("hide");



                if(data.result.flag== false){
                    Swal.fire("Warning",data.result.message,data.result.class);
                    return false;
                }




                forecastDTable.destroy();
                /* tbody template */
                var template = "";
                    template += "{{#result}}";
                    template += "<tr>";
                    template += "<td>{{month}}</td>";
                    template += "<td class='text-right'>{{noOfStudiesFormatted}}</td>";
                    template += "<td class='text-right'>{{monthlyCostFormatted}}</td>";
                    template += "</tr>";
                    template += "{{/result}}";
                var html = Mustache.to_html(template, data);
                  $("#forecast-table tbody").html(html);

    /*  Re-init datatable  */
    forecastDTable = $('#forecast-table').DataTable( {
        dom: 'Bfrtip',
        columnDefs : [{"targets":0, "type":"date"}],
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'
        ]
    } );


            }
        });

    });







});
