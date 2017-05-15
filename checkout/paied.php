
<?php
include "../config/config.php";
  if($_POST){
    $orderid=$_POST['order_id'];
    $target_dir = "../backend/order/slip/";
    $randomfile = 1;
    $insert_picture = "order/slip/";
    //while ($randomfile != 0){

    $randomfile = rand(1,999999);
    $target_file = $target_dir.$randomfile.$_FILES["fileupload"]["name"];
    $insert_picture = $insert_picture.$randomfile.$_FILES["fileupload"]["name"];
    //ทำการ random ชื่อแล้ว เช็คใน db ว่ามีการซ้ำรึไม่
    //}

    if(copy($_FILES['fileupload']['tmp_name'], $target_file)){

      echo "อัพเดทสำเร็จ";
      $sql = "UPDATE table_order SET payslip='".$insert_picture."' WHERE order_id=".$orderid;

       $query_insert_product = $connect->query($sql);
       if ($query_insert_product){
         echo "อัพเดทสินค้าสำเร็จ";
       }
    }
  }
?>
