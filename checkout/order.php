<div class="jumbotron cart">

  <?php
  if (isset($_POST['id_product'])){

    if ($_SESSION['cart'][0] == ''){
        $_SESSION['cart'][0] = $_POST['id_product'];
        $_SESSION['cartqty'][0] = 1;

    }
    else {
    $key = array_search($_POST['id_product'],$_SESSION['cart']);
    if ((string)$key != ""){
      $_SESSION['cartqty'][$key] = $_SESSION['cartqty'][$key]+1;

    }
    else  {
      $count_session = count($_SESSION['cart']);
      $_SESSION['cart'][$count_session] = $_POST['id_product'];
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
               <th>รหัสสินค้า</th>
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
         <form method="POST">

            <tr>
              <td><img class="cartimg" src="<?php echo $picture_product_cart[$i]; ?>"</td>
              <td><?php echo $name_product_cart[$i]; ?></td>
              <td><?php echo $price_product_cart[$i]; ?></td>
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
