<?php

session_start();

if(isset($_GET['code']))
{
    $code = $_GET['code'];

    foreach($_SESSION['cart'] as $key => &$item)
    {
        if($item['code'] == $code)
        {
            $item['quantity']--;

            if($item['quantity'] <= 0)
            {
                unset($_SESSION['cart'][$key]);
            }

            break;
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header("Location:addtocart.php");
exit;

?>