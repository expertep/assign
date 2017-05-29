<?php
  include_once "../config/config.php";

  if(isset($_POST['pay'])){



    $select=$connect->query('INSERT INTO table_order (member_id,date,destination)
    VALUES ('.$_SESSION['id'].',CURRENT_TIMESTAMP,"'.$_SESSION['destination'].'")');
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
        if (!empty($_SESSION['discount_code'])){
          $ID_Discount = $_SESSION['discount_id'];
          $Code_Discount = $_SESSION['discount_code'];
          $User_ID = $_SESSION['id'];
          $sql_insert_discount = 'INSERT INTO table_detail_discount (ID_Discount,member_id,Code_Discount,Date)
          VALUES ("'.$ID_Discount.'","'.$User_ID.'","'.$Code_Discount.'",NOW()) ';
          $query_insert_discount = $connect->query($sql_insert_discount);
          if ($query_insert_discount){
            unset($_SESSION['discount_id']);
            unset($_SESSION['discount_code']);
            unset($_SESSION['discount_percent']);
          }


      }
  }

 ?>
 <script type="text/javascript">
  window.location.href = '../index.php';
</script>
