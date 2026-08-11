<?php
session_start();

if(isset($_GET['code']))
{
    $code = $_GET['code'];

    foreach($_SESSION['cart'] as $key => $item)
    {
        if($item['code'] == $code)
        {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Re-index the array
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header("Location:addtocart.php");
exit;
?>