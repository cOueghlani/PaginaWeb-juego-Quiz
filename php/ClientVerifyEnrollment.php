<?php
function comprobar($correo){
$respuestaVip = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
//echo $respuestaVip->comprobar($correo);
return $respuestaVip->comprobar($correo);
}

// comprobar("coueghlani001@ikasle.ehu.eus");

?> 
