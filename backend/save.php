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
    }
    else if(isset($_POST['cancel'])) {
      $sql = "UPDATE table_order SET pay='f' WHERE order_id='".$_POST['order_id']."'";
    }
    if(isset($sql)){
      if ($connect->query($sql) === TRUE) {unset($_POST);}
      else {
          echo "Error updating record: " . $connent->error;
      }
    }
}
 ?>
