$(document).ready(function () {
	$('#archivo').change(function (e) {
		var foto = $("#archivo").get(0).files[0];
		if (foto) {
			var reader = new FileReader();
			reader.readAsDataURL(foto);
			reader.onload = function () {
				if ($("#imagen").length) {
					$("#imagen").attr('src', reader.result);
					var imagen = $("<img id='imagen'>");
				} else {
					var imagen = $("<img name='imagen' id='imagen'>");
					imagen.attr("src", reader.result);
					imagen.attr("height", 150);
					imagen.attr("width", 120);
					imagen.appendTo("#imagenamostrar");
				}
			}
		}
	});
});
function borrar()
{
	if ($("#imagen").length) 
		$("#imagen").remove();
}

