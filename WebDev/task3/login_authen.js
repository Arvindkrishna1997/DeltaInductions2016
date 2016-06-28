function authenticate () {
    if(document.getElementById("name").value=="") {
        alert("enter the name");
        return false;
    }
    if(document.getElementById("password").value=="")
    {
        alert("enter the password");
        return false;
    }
    return true;
}
document.getElementById("form").addEventListener("submit",function (e){
   e.preventDefault();
    alert("came here");
    var f= e.target;
    var formdata = new FormData(f);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState==4&&xhttp.status==200)
        {
            if (xhttp.responseText.search("Success")>=0){


                window.location.href = "detailspage.php";
            }
            else
                alert(xhttp.responseText);
        }
    };
    xhttp.open("POST", "login_authenticate.php", true);
    xhttp.send(formdata);
});