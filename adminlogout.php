<?php
session_start();


$_SESSION = array();


session_destroy();


if (isset($_COOKIE['email'])) {
    setcookie("email", "", time() - 3600, "/");
}
if (isset($_COOKIE['password'])) {
    setcookie("password", "", time() - 3600, "/");
}

header("Location:adminlogin.php");
exit;
?>
