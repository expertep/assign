<?php

require_once 'config/config.php';
include_once 'template/header.php';


?>
<style media="screen">
  .panel-title{display: inline;}
</style>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">เลือกที่อยู่จัดส่ง</h3>
    </div>
    <div class="panel-body">
      <form class="" action="" method="post">

        <div class="panel panel-default">
          <div class="panel-heading">
            <input type="radio" value="1" name='add' checked/><h3 class="panel-title">ที่อยู่ 1</h3>
          </div>
          <div class="panel-body">
            <p><?php echo $_SESSION['address']; ?></p>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <input type="radio" value="2" name='add'/><h3 class="panel-title">ที่อยู่ 2</h3>
          </div>
          <div class="panel-body">
            <textarea class="form-control" name="address"> </textarea>
          </div>
        </div>
        <button type="submit" name="pay" value="pay">ชำระเงิน</button>
      </form>
    </div>
  </div>
  <?php
    if(isset($_POST['pay'])){


   ?>
   <div class="panel panel-default">
     <div class="panel-heading">
       <h3 class="panel-title">ใบเสร็จ</h3>
     </div>
     <div class="panel-body">
       <h3>จัดส่งที่</h3>
       <p><?php echo $_SESSION['address']; ?></p>

       <table class="table">
         <tr>
           <thead>
             <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อ</th>
                <th>ราคา</th>
                <th>จำนวน</th>
             </tr>
           </thead>
       <?php
         $total_price = 0;
        for ($i =0 ; $i<count($_SESSION['cart']);$i++){
          $sql_cart_select = 'SELECT * FROM table_product WHERE id_product = "'.$_SESSION['cart'][$i].'"';
          $query_cart_select = $connect->query($sql_cart_select);
          $cart_select = $query_cart_select->fetch_assoc();
          $price_qty = $cart_select['price_product'] * $_SESSION['cartqty'][$i];
          $total_price = $total_price + $price_qty; //total price ของ Cart

          $name_product_cart[$i] = $cart_select['name_product']; //สำหรับส่งไป Checkout
          $price_product_cart[$i] = $cart_select['price_product'];
          $picture_product_cart[$i] = $cart_select['picture_product'];
          $id_product_cart[$i] = $cart_select['id_product'];
        ?>


             <td><?php echo $id_product_cart[$i]; ?></td>
             <td><?php echo $name_product_cart[$i]; ?></td>
             <td><?php echo $price_product_cart[$i]; ?></td>
               <td>
                 <input type="number" class="form-control" name="select_cartqty[]" value="<?php  echo $_SESSION['cartqty'][$i]; ?>" readonly>
               </td>
           </tr>
           <?php } ?>
           <tr>
             <th colspan="2">ราคาทั้งหมด</th>
             <th colspan="2"><?php echo $total_price; ?></th>
           </tr>
         </table>
     </div>
   </div>
 <?php }
  ?>
</div>
<?php
include_once 'template/footer.php';

 ?>
 <style media="screen">
   .jumbotron.footer{position: absolute;}
 </style>
