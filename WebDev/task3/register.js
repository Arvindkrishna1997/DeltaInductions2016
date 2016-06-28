function clientside() {
    if (document.getElementById("name").value == "") {
        alert("name is required");
        return false;
    }
    if (document.getElementById("password").value == "") {
        alert("password is required");
    }
    if (document.getElementById("pic").value == "") {
        alert("select an image");
        return false;
    }
    //alert(document.form.pic.value);
    var emailID = document.getElementById("email").value;
    var atpos = emailID.indexOf("@");
    var dotpos = emailID.lastIndexOf(".");
    if (1 > atpos || ( 2 > dotpos - atpos  )) {
        alert("invalid email");
        return false;
    }
    if (document.getElementById("phoneno").value == "") {
        alert("enter a phone number");
        return false;
    }
    if (document.getElementById("address").value == "") {
        alert("address is required");
        return false;
    }
    return true;
}
document.getElementById('form').addEventListener("submit",function(e){

    e.preventDefault();
    var f = e.target;
    var formdata = new FormData(f);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4  && xhttp.status == 200 ) {

            if (xhttp.responseText.search("Success")>=0) {
                alert("successfully regitered");
                window.location.href = 'login page.php';

            }
            else
                alert(xhttp.responseText);
        }
    };
    xhttp.open("POST", "validateserverside.php", true);
    xhttp.send(formdata);


});
