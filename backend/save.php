<?php

//include_once "../config/config.php";
    if(isset($_POST['edit'])){

      $sql = "UPDATE table_product SET name_product='".$_POST['name_product']."' WHERE id_product='".$_POST['id_product']."'";
      if ($connect->query($sql) === TRUE) {

      } else {
          echo "Error updating record: " . $connent->error;
      }
      unset($_POST);
    }
    else if(isset($_POST['delete'])) {
      $sql = "DELETE FROM table_product WHERE id_product='".$_POST['id_product']."'";
      if ($connect->query($sql) === TRUE) {

      } else {
        echo "Error updating record: " . $connect->error;
      }
      unset($_POST);
    }

 ?>
