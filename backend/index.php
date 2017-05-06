<?php
require_once '../config/config.php';
include_once 'template/header.php';



if(!isset($_GET['action'])){
  include_once 'template/dashboard.php';
}
if (isset($_GET['action'])){


  if($_GET['action'] == "product"){

   include_once 'product/product.php';
  }
  else if ($_GET['action'] == "insertproduct"){
  include_once 'product/product_insert.php';

  }

  else if ($_GET['action']== "member"){

  include_once 'member/member.php';


  }

  else if ($_GET['action']== "order"){

  include_once 'order/order.php';

  }
  else if ($_GET['action']== "logout"){
    header('Location:..\index.php');
    exit;
  }
}


include_once 'template/footer.php';




 ?>
