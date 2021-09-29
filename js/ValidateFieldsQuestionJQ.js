$(document).ready(function () {
    $("#fquestion").submit(function () {
     
        if (($("#pregunta").val().length <10 || $("#respuestac").val().length ==0 || $("#respuestai1").val().length ==0 || 
        $("#respuestai2").val().length ==0 || $("#respuestai3").val().length ==0 || $("#temaPregunta").val().length == 0))
        {
            alert("Revisa que todos los campos esten rellenados");
            event.preventDefault();
        }
        else
        {
            if(!validarcorreo()){
                alert("Correo no valido: " + $("#correo").val());
                event.preventDefault();
            }
            else 
               alert("Pregunta enviada con exito");
               return;
        }

    });
});

function validarcorreo()
{
    var regExpCorreoP = /^([a-zA-Z]+)((\.[a-zA-Z]+)?)@ehu\.(eus|es)$/;
    var regExpCorreoA = /^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/;
    if (regExpCorreoA.test($("#correo").val()) || regExpCorreoP.test($("#correo").val())) {
        return true;
    }
    else
        return false;
}






