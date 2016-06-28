<!DOCTYPE html >
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>

<h2>Student Adding form</h2>
<form id="form" method="post"  action="validateserverside.php" enctype="multipart/form-data"  >
    <input  type="text" name="name" placeholder="name" id="name" autocomplete="off" >
    <br/><br/>
  <input type="password" name="password"  placeholder="password" id="password" autocomplete="off">
   <br/><br/>
   Profile Pic:
    <input type="file" name="pic" accept="image/*" id="pic">
    <br/><br/>
  <input type="text" name="email" placeholder="E-mail" id="email" autocomplete="off">
    <br/><br/>
  <input type="number" name="phoneno" placeholder="phoneno" id="phoneno" autocomplete="off">
        <br/><br/>
  <textarea name="physicaladdress" rows="3" cols="40" placeholder="address" id="address" ></textarea>
    <br/><br/>
    <input type="submit" class="animated" onclick="return clientside()" value="signup">
    <br/>
</form>
<script  src="register.js" type="text/javascript" >
    </script>
</body>
</html>