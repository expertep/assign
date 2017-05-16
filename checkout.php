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
      <script type="text/javascript">
      function check(){
        if(($('#address').val())!=' '){
          return true;
        }
        else{
          alert("Please enter address");
          return false;
        }
      }
      </script>
      <form class="" action="" method="post" onsubmit="return check();">
<?php if($_SESSION['address']!=''){ ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <input type="radio" value="1" name='add' required/><h3 class="panel-title">ที่อยู่ 1</h3>
          </div>
          <div class="panel-body">
            <p><?php echo $_SESSION['address']; ?></p>
          </div>
        </div>
        <?php } ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <input type="radio" value="2" name='add' required <?php if($_SESSION['address']==''){echo "checked";} ?>/><h3 class="panel-title">ที่อยู่อื่นๆ</h3>
          </div>
          <div class="panel-body">
            <textarea class="form-control" name="address" id="address"></textarea>
          </div>
        </div>
        <button type="submit" name="pay" value="pay">ตกลง</button>
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
       <?php echo date('d/m/Y'); ?>
       <h3>ผู้รับ <?php echo $_SESSION['firstname']."  ".$_SESSION['lastname']; ?></h3>
       <h3>ที่
       <?php
      if($_POST['add']==2){
        echo $_POST['address'];
      }
       else echo $_SESSION['address'];
       ?></h3>

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
          $sql_cart_select = 'SELECT * FROM table_product WHERE product_id = "'.$_SESSION['cart'][$i].'"';
          $query_cart_select = $connect->query($sql_cart_select);
          $cart_select = $query_cart_select->fetch_assoc();
          $price_qty = $cart_select['product_price'] * $_SESSION['cartqty'][$i];
          $total_price = $total_price + $price_qty; //total price ของ Cart

          $product_name_cart[$i] = $cart_select['product_name']; //สำหรับส่งไป Checkout
          $product_price_cart[$i] = $cart_select['product_price'];
          $product_picture_cart[$i] = $cart_select['product_picture'];
          $product_id_cart[$i] = $cart_select['product_id'];
        ?>


             <td><?php echo $product_id_cart[$i]; ?></td>
             <td><?php echo $product_name_cart[$i]; ?></td>
             <td><?php echo $product_price_cart[$i]; ?></td>
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
     <form class="" action="checkout/pay.php" method="post">
       <button type="submit" name="pay" value="pay">เสร็จสิ้น</button>
     </form>
   </div>
 <?php }
  ?>

</div>
<?php
include_once 'template/footer.php';

 ?>
