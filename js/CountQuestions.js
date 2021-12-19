$(document).ready(function() {	

    function countQuestions(){
        $.ajax({
    
            url: '../json/Questions.json',
            dataType:"json",
            processData: false,
            contentType: false,
            cache: false,
            type: 'GET',
            success: function(data){
                ContarPreguntas(data);
            }  
        });
    }

   function ContarPreguntas(data){
        var correo = $("#correo").val();
        $.getJSON("../json/Questions.json", function (json) {
            var preg = 0;
            var pregtotal = 0;
            for (pregunta in json.assessmentItems) {
                if (json.assessmentItems[pregunta].author == correo) {
                    preg = preg + 1;
                }
                pregtotal = pregtotal + 1;
            }
        $("#NumPreg").html("Numero de preguntas tuyas sobre el total </br> " +preg + "/" + pregtotal);
        })
       
    }
    setInterval(ContarPreguntas, 1000); 
});