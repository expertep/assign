<?php
require_once '../config/config.php';
include_once 'template/header.php';


if ($_GET['action']== NULL){
  include_once 'template/dashboard.php';
}

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





include_once 'template/footer.php';




 ?>
