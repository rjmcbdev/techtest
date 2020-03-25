$(function(){

    $("#btn-check-forecast").click(function(){
        $("#forecast-modal").modal("show");
    });

    $("#btn-get-forecast").click(function(){

        // var person = {
        //     firstName: "Christophe",
        //     lastName: "Coenraets",
        //     blogURL: '<a class="vglnk" href="http://coenraets.org" rel="nofollow"><span>http</span><span>://</span><span>coenraets</span><span>.</span><span>org</span></a>'
        // };

        // var html = Mustache.to_html(template, person);



        formData = $("#forecast-form").serializeArray();
        $.ajax({
            dataType : "json",
            type : "GET",
            url : "/forecast/get-forecast",
            data : formData
            ,beforeSend : function(){

            },success : function(data){
                var template = "";
                    template += "{{#result}}";
                    template += "<tr>";
                    template += "<td>{{month}}</td>";
                    template += "<td>{{days}}</td>";
                    template += "<td class='text-right'>{{noOfStudiesFormatted}}</td>";
                    template += "<td class='text-right'>{{monthlyCostFormatted}}</td>";
                    template += "</tr>";
                    template += "{{/result}}";
                var html = Mustache.to_html(template, data);
                $("#forecast-table tbody").html(html);


            }
        });

    });







});
