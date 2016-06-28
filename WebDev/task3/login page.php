<?php
// Start the session
session_start();
if(isset($_SESSION['name']))
  header("Location:detailspage.php");
?>

<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login page</title>
<link type="text/css" rel="stylesheet" href="login.css">
</head>
<body>
<h2>Log In</h2>
<div class="login">
<form id="form" method="post" action="login_authenticate.php" onsubmit="return authenticate()" >
<input type="text" name="name" placeholder="Username" id="name" autocomplete="off" >
<br/>
<input type="password" name="password"  placeholder="password" id="password" autocomplete="off">
    <br/><br/><br/><br/>

<input type="submit" class="animated" name="login" value="login" >

</form>
    <a class="signup" href="registration form.php">sign up?</a>
 </div>
<br/>
<div class="result" >
    <form method="post" action="viewuser.php" >
        <input id="search" name="search" type="text" class="form-control" placeholder="search user" onkeyup="suggest(this.value)" autocomplete="off"/>
     <!--   <input type="submit" value="search" id="searchbutton" >-->
        <button>search</button>
    </form>

<table class="tablehidden" id="result" name="result">
</table>
</div>
<script type="text/javascript" src="login_authen.js" ></script>
<script type="text/javascript" src="suggestion.js" ></script>
</body>
</html>
