<div class="main">
  <div class="jumbotron cart">

    <?php
    if (isset($_POST['discoutCode'])){
      $discount_code = $_POST['discoutCode'];


        $sql_select_discount = 'SELECT * FROM table_discount WHERE Code_Discount = "'.$discount_code.'" ';
        $query_select_discount = $connect->query($sql_select_discount);

        if ($select_discount = $query_select_discount->fetch_assoc()){


            $sql_select_member = 'SELECT * FROM table_detail_discount WHERE member_id = "'.$_SESSION['id'].'" AND ID_Discount = "'.$select_discount['ID_Discount'].'"  ';
            $query_select_member = $connect->query($sql_select_member);
            if ($select_member = $query_select_member->fetch_assoc()){
              ?>
              <div class="alert alert-danger" role="alert">ล้มเหลว! Account นี้เคยใช้งานโค๊ดนี้มาแล้ว!</div>
            <?php
            }
            else {
            /*  $using_discount = $discount_code;
              $discount_percent = $select_discount['Percent_Discount'];
              $discount_id = $select_discount['ID_Discount'];*/

              $_SESSION['discount_percent'] = $select_discount['Percent_Discount'];
              $_SESSION['discount_id'] = $select_discount['ID_Discount'];
              $_SESSION['discount_code'] = $discount_code;
              ?>
              <div class="alert alert-success" role="alert">สำเร็จ! โค๊ดถูกต้องได้รับส่วนลด <?php echo $select_discount['Percent_Discount']."%"; ?></div>
              <?php
            }
        }
        else {
          ?>
          <div class="alert alert-danger" role="alert">โค๊ดส่วนลดไม่ถูกต้อง!</div>
          <?php
        }

    }

    if (isset($_POST['product_id'])){

      if ($_SESSION['cart'][0] == ''){
          $_SESSION['cart'][0] = $_POST['product_id'];
          $_SESSION['cartqty'][0] = 1;

      }
      else {
      $key = array_search($_POST['product_id'],$_SESSION['cart']);
      if ((string)$key != ""){
        $_SESSION['cartqty'][$key] = $_SESSION['cartqty'][$key]+1;

      }
      else  {
        $count_session = count($_SESSION['cart']);
        $_SESSION['cart'][$count_session] = $_POST['product_id'];
        $_SESSION['cartqty'][$count_session] = 1;
         }
       }
     }
    ?>

          <div class="panel panel-default cart">
             <div class="panel-heading">Cart</div>

            <table class="table">
              <thead>
                <tr>
                   <th>รหัส</th>
                   <th>รูป</th>
                   <th>ชื่อ</th>
                   <th>ราคา</th>
                   <th>จำนวน</th>
                </tr>
              </thead>
            <?php
            if (isset($_POST['select_cartqty'])){

              $select_cartqty = $_POST['select_cartqty'];
             for ($u = 0 ;$u<count($select_cartqty);$u++){
               $_SESSION['cartqty'][$u] = $select_cartqty[$u];

             }
           }
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
             <form method="POST">

                <tr>
                  <td><?php echo $product_id_cart[$i]; ?></td>
                  <td><img class="cartimg" src="<?php echo $product_picture_cart[$i]; ?>"</td>
                  <td><a href="product.php?id=<?php echo $product_id_cart[$i]; ?>"> <?php echo $product_name_cart[$i]; ?></a></td>
                  <td><?php echo $product_price_cart[$i]; ?></td>
                    <td>
                      <input type="number" class="form-control" name="select_cartqty[]" value="<?php  echo $_SESSION['cartqty'][$i]; ?>">

                    </td>
                    <td>

                      <a href="checkout/delete_cart.php?count=<?php echo $i; ?>">ลบ</a>

                    </td>

                </tr>

                <?php }
                  if(count($_SESSION['cart'])==0){
                    unset($_SESSION['cart']);
                    header('Location: index.php');

                  }
                 ?>
                <tr>
                  <th colspan="2">ราคาทั้งหมด</th>
                  <th colspan="2"><?php echo $total_price-($total_price*($_SESSION['discount_percent']/100)); ?></th>
                </tr>
                <tr>
                  <th colspan="4"><button>Update Cart</button></th>
                </tr>
              </form>
              </table>
          </div>
          <div>
            <form method="POST">
            โค๊ดส่วนลด <input type="text" name="discoutCode" class="form-control" placeholder="โค๊ดส่วนลด" <?php if(isset($_SESSION['discount_code'])){ ?> value="<?php echo $_SESSION['discount_code']; ?>"  <?php  } ?> required>
            <button class="btn btn-default"> Apply Coupon </button>
          </form>

          <form method="POST" action="checkout.php">

            <input type="hidden" name="test" value="">
          <button class="btn btn-default"
          <?php  if (!isset($_SESSION['username'])){echo 'disabled';?>> กรุณาล็อคอินก่อน <?php }
               else {
                  ?>
                  > Checkout
                 <?php
               }
          ?>

          </button>
        </form>
      </div>

  </div>
</div>
