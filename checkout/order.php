<?php

if ($_SESSION['username'] != NULL){
?>
  <div class="container">
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
      $_SESSION['cart'][count($_SESSION['cart'])] = $_POST['id_product'];
      $_SESSION['cartqty'][count($_SESSION['cart'])] = 1;

       }
    }
  ?>

  </div>
  <?php
        }
        ?>
        <table class="table">
        <?php

         for ($i =0 ; $i<count($_SESSION['cart']);$i++){

           $sql_cart_select = 'SELECT * FROM table_product WHERE id_product = "'.$_SESSION['cart'][$i].'"';
           $query_cart_select = $connect->query($sql_cart_select);
           $cart_select = $query_cart_select->fetch_assoc();
         ?>
            <tr>
              <td><img src="<?php echo $cart_select['picture_product']; ?>"</td>
              <td><?php echo $cart_select['name_product']; ?></td>
              <td><?php echo $cart_select['price_product']; ?></td>
                <td><?php echo $_SESSION['cartqty'][$i]; ?></td>
                <td>ลบ</td>
            </tr>

            <?php } ?>
          </table>
          <?php
      }

      else {

        header('Location:index.php');
      }
?>
