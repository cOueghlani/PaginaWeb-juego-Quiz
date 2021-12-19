$(document).ready(function () {
    $('#botonPreg').on('click', function (e) {
        e.preventDefault();
        var myForm = document.getElementById('fquestion');
        var formData = new FormData(myForm);
        $.ajax({
            url: "AddQuestionWithImage.php",
            type: "POST",
            data: formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            cache: false,
            success: function (dataResult) {
                $('#fquestion')[0].reset();           
                $("#InsertarPretuntas").show();
                $('#InsertarPretuntas').html(dataResult);
            }

        });
    });
});
