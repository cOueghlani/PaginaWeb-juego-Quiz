
$(document).ready(function () {
    $("#subir").click(function () {
     
        if (($("#pregunta").val().length <10 || $("#respuesta1").val().length ==0 || $("#respuesta2").val().length ==0 || 
        $("#respuesta3").val().length ==0 || $("#respuesta4").val().length ==0 || $("#temaPregunta").val().length == 0))
        {
            alert("Revisa que todos los campos esten rellenados");
        }
        else
        {
            if(validarcorreo())
            alert("Pregunta enviada con exito");
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
    alert("Correo no valido: " + $("#correo").val());
}






