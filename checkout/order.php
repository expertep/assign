<div class="main">
  <div class="jumbotron cart">

    <?php
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
                  <th colspan="2"><?php echo $total_price; ?></th>
                </tr>
                <tr>
                  <th colspan="4"><button>Update Cart</button></th>
                </tr>
              </form>
              </table>
          </div>
          <div>
            <form method="POST">
            โค๊ดส่วนลด <input type="text" name="discoutCode" class="form-control" placeholder="โค๊ดส่วนลด">
            <button class="btn btn-default"> Apply Coupon </button>
          </form>

          <form method="POST" action="checkout.php">

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
