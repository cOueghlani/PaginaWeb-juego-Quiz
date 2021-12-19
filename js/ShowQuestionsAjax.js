XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function () {
    if (XMLHttpRequestObject.readyState != 4) {
        var obj = document.getElementById('VerPreguntas');
        obj.innerHTML = XMLHttpRequestObject.responseText;
    }
}
function VerPreguntas() {
    XMLHttpRequestObject.open("GET", "ShowJsonQuestionsWithImage.php", true);
    XMLHttpRequestObject.send(null);
}




