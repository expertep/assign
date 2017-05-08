<?php
  include_once "../config/config.php";

  if(isset($_POST['pay'])){
    $select=$connect->query('INSERT INTO table_order (member_id,date)
    VALUES ('.$_SESSION['id'].',CURRENT_TIMESTAMP)');
    $select=$connect->query('select last_insert_id() as last_id from table_order');
    $result=$select->fetch_assoc();
    for ($i =0 ; $i<count($_SESSION['cart']);$i++){
        $sql = "INSERT INTO table_bill (order_id,product_id,amount)
        VALUES (".$result['last_id'].",".$_SESSION['cart'][$i].",".$_SESSION['cartqty'][$i].")";
        if ($connect->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }

    }
    
unset($_SESSION['cart']);
unset($_SESSION['cartqty']);
  }

 ?>
