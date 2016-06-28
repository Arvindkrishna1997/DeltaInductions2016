function clientside() {
    if (document.getElementById("pic").value == "") {
        alert("select an image");
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

                window.location.href = 'detailspage.php';

            }
            else
                alert(xhttp.responseText);
        }
    };
    xhttp.open("POST", "edit_authenticate.php", true);
    xhttp.send(formdata);


});
