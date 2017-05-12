<?php

//include_once "../config/config.php";
if(isset($_POST)){
    unset($sql);
    if(isset($_POST['edit'])){
      $sql = "UPDATE table_product SET
      name_product='".$_POST['name_product']."',
      price_product='".$_POST['price_product']."',
      category_product='".$_POST['category_product']."',
      number_product='".$_POST['number_product']."'
       WHERE id_product='".$_POST['id_product']."'";
    }
    else if(isset($_POST['delete'])) {
      $sql = "DELETE FROM table_product WHERE id_product='".$_POST['id_product']."'";
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
