<?php
require_once 'config/config.php';
include_once 'template/header.php';
$state=1;
?>
<style media="screen">
  .panel-title{display: inline;}
</style>
<script type="text/javascript">
function checkname(){
  if(($('#firstname').val())!=' '||($('#lastname').val())!=' '){
    return true;
  }
  else{
    alert("Please enter name");
    return false;
  }
}
</script>

<div class="main">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">ผู้รับ</h3>
    </div>
    <div class="panel-body">
      <?php if(isset($_POST['next'])){
          if($_POST['next']=='nextsave'){
            $_SESSION['firstname']=$_POST['firstname'];
            $_SESSION['lastname']=$_POST['lastname'];
            $sql='UPDATE table_member SET lastname="'.$_SESSION['lastname'].'",firstname="'.$_SESSION['firstname'].'" WHERE member_id='.$_SESSION['id'];
            $connect->query($sql);
            echo $sql;
          }
        $state=2;
      }?>
      <form class="" action="" method="post" onsubmit="return checkname();">
        <?php if($_SESSION['firstname']==''){ ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">เพิ่มชื่อผู้รับ</h3>
          </div>
          <div class="panel-body">
              <label for="firstname" class="col-2 col-form-label">ชื่อ</label>
              <div class="col-5">
                <input class="form-control" name="firstname" type="text" value="" id="firstname" required>
              </div>
              <label for="lastname" class="col-2 col-form-label">นามสกุล</label>
              <div class="col-5">
                <input class="form-control" name="lastname" type="text" value="" id="lastname" required>
              </div>
          </div>
        </div>
          <button type="submit" name="next" value="nextsave" class="btn btn-primary">next & save</button>
        <?php }
        else{?>
          ชื่อจริง <?php echo $_SESSION['firstname'] ?><br>
          นามสกุล <?php echo $_SESSION['lastname'] ?><br>
          <button type="submit" name="next" value="next" class="btn btn-primary">next</button>
        <?php } ?>

      </form>
    </div>
  </div>


    <?php if($state>=2){ ?>
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
            <input type="radio" value="1" name='add' required/><h3 class="panel-title"> ที่อยู่ 1</h3>
          </div>
          <div class="panel-body">
            <p><?php echo $_SESSION['address']; ?></p>
          </div>
        </div>
        <?php } ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <input type="radio" value="2" name='add' required <?php if($_SESSION['address']==''){echo "checked";} ?>/><h3 class="panel-title"> ที่อยู่อื่นๆ</h3>
          </div>
          <div class="panel-body">
            <textarea class="form-control" name="address" id="address"></textarea>
          </div>
        </div>
        <?php $str=($_SESSION['address']!='')?'Confirm':'Confirm & save'; ?>
        <button type="submit" name="pay" value="<?php echo $str ?>" class="btn btn-primary"><?php echo $str ?></button>
      </form>
    </div>
  </div>
  <?php } ?>

  <?php
    if(isset($_POST['pay'])){
      if($_POST['pay']=='Confirm & save'){
        $sql='UPDATE table_member SET address="'.$_POST['address'].'" WHERE member_id='.$_SESSION['id'];
        $connect->query($sql);
        $_SESSION['address']==$_POST['address'];
      }
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
        $_SESSION['destination']=$_POST['address'];
        echo $_POST['address'];
      }
       else {echo $_SESSION['address'];
         $_SESSION['destination']=$_SESSION['address'];
       }
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
             <td><?php  echo $_SESSION['cartqty'][$i]; ?></td>
           </tr>
           <?php } ?>
           <tr>
             <th colspan="2">ราคาทั้งหมด</th>
             <th colspan="2"><?php echo $total_price; ?></th>
           </tr>
         </table>
     </div>
     <form class="" action="checkout/pay.php" method="post">
       <button type="submit" class="btn btn-primary" name="pay" value="pay">เสร็จสิ้น</button>
       <a href="cart.php"><button class="btn btn-primary" name="pay" value="pay">ยกเลิก</button></a>
     </form>
   </div>
 <?php } ?>

</div>
<?php
include_once 'template/footer.php';

 ?>
