function suggest(dynaming) { //here cadena is your input value
    var min = 1;
    if (dynaming.length >= min) { // true when the typed value have 3 or more characters
        var formdata = new FormData();
        formdata.append("dynaming", dynaming);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                if (xhttp.responseText) {
                    document.getElementById("result").innerHTML = xhttp.responseText;
                }
            }
        };
        xhttp.open("POST", "suggestion.php", true);
        xhttp.send(formdata);
    }
    

        if (dynaming.length >=min) { //will show or not the table depending on the input value
        document.getElementById('result').className = 'table';
    } else
        document.getElementById('result').className += 'hidden';
}