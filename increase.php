<?php

session_start();

if(isset($_GET['code']))
{
    $code = $_GET['code'];

    foreach($_SESSION['cart'] as &$item)
    {
        if($item['code'] == $code)
        {
            $item['quantity']++;
            break;
        }
    }
}

header("Location:addtocart.php");
exit;

?>