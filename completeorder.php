<?php

session_start();

include("connection.php");

if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
}

$id = $_GET['id'];

$sql = "UPDATE orderss
SET order_status='Completed'
WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    echo "<script>

    alert('Order Completed Successfully');

    window.location='allorder.php';

    </script>";
}
else
{
    echo "<script>

    alert('Failed');

    history.back();

    </script>";
}

?>