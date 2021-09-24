/*function validarFormulario() {

    //Variables
    var correo = document.getElementById('correo').value;
    var enunciado = document.getElementById('pregunta').value;
    var resp1 = document.getElementById('respuesta1').value;
    var resp2 = document.getElementById('respuesta2').value;
    var resp3 = document.getElementById('respuesta3').value;
    var resp4 = document.getElementById('respuesta4').value;
    var cod = document.getElementById("complejidad").value;
    var tema = document.getElementById('temaPregunta').value;

    //Pregunta extensa
    if (enunciado.length < 10) {
        alert('La pregunta debe de ser mas extensa')
    }
    else {
        //Campos completos
        if (correo.length == 0 || resp1.length == 0 || resp2.length == 0 ||
            resp3.length == 0 || resp4.length == 0 || tema.length == 0) {
            alert('Revisa que todos los campos esten completos');
            return false;
        }
        //Verificación de correo
        var regExpCorreoP = /^([a-zA-Z]+)((\.[a-zA-Z]+)?)@ehu\.(eus|es)$/;
        var regExpCorreoA = /^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/;
        if (regExpCorreoA.test(correo) || regExpCorreoP.test(correo)) {
            alert('Pregunta enviada con exito');
            return true;
        }
        alert('Ha ocurrido algun problema');
        return false;
    }
}*/