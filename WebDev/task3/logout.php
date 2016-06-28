<?php
session_start();
header("Pragma: no-cache");
session_unset();
session_destroy();
header("Location:login page.php");
?>