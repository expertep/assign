<?php
require_once '../config/config.php';

include_once 'template/header.php';


?>
<div class="body">
  <?php
  if($_SESSION['user_status'] == '1'){
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
    else if ($_GET['action'] == "insertdiscount"){
    include_once 'discount/insertdiscount.php';

    }

    else if ($_GET['action']== "member"){

    include_once 'member/member.php';


    }
    else if ($_GET['action']== "orderhistory"){

    include_once 'order/orderhistory.php';

    }
    else if ($_GET['action']== "order"){

    include_once 'order/order.php';

    }
    else if ($_GET['action']== "logout"){
      header('Location:..\index.php');
      exit;
    }
  }
}
else {
  header('Location:../');
}
  ?>
</div>
  <?php
  include_once 'template/footer.php';

 ?>
