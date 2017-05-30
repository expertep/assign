<?php

//include_once "../config/config.php";
if(isset($_POST)){
    unset($sql);
    if(isset($_POST['edit'])){
      $sql = "UPDATE table_product SET
      product_name='".$_POST['product_name']."',
      product_price='".$_POST['product_price']."',
      product_category='".$_POST['product_category']."',
      product_number='".$_POST['product_number']."'
       WHERE product_id='".$_POST['product_id']."'";
    }

    else if(isset($_POST['delete'])) {
      $sql = "DELETE FROM table_product WHERE product_id='".$_POST['product_id']."'";
    }
    else if(isset($_POST['sent'])) {
      $sql = "UPDATE table_order SET pay='s' WHERE order_id='".$_POST['order_id']."'";
      $sql1="UPDATE table_order o INNER JOIN table_bill b ON o.order_id=b.order_id INNER JOIN table_product p ON b.product_id=p.product_id SET p.product_number=p.product_number-b.amount WHERE o.order_id='".$_POST['order_id']."'";
      $connect->query($sql1);
    }
    else if(isset($_POST['cancel'])) {
      $sql = "UPDATE table_order SET pay='f' WHERE order_id='".$_POST['order_id']."'";
    }
    else if(isset($_POST['editmember'])) {
      $sql = "UPDATE table_member SET address='".$_POST['address']."',status='".$_POST['status']."' WHERE member_id='".$_POST['member_id']."'";
    }
    else if(isset($_POST['deletemember'])) {
      $sql = "DELETE FROM table_member WHERE member_id='".$_POST['member_id']."'";
    }
    if(isset($sql)){
      if ($connect->query($sql) === TRUE) {unset($_POST);}
      else {
          echo "Error updating record: " . $connent->error;
      }
    }
}
 ?>
