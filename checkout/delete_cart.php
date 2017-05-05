<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once '../config/config.php';
    if (isset($_GET['count'])){



    $array_delete_id = $_GET['count'];

    unset($_SESSION['cart'][$array_delete_id]);
    unset($_SESSION['cartqty'][$array_delete_id]);

    $_SESSION['cart'] = array_values($_SESSION['cart']);
    $_SESSION['cartqty'] = array_values($_SESSION['cartqty']);


    header('Location:../cart.php');

    }
    else {

    header('Location:../Error.html');

    }
 ?>
  </body>
</html>
