<?php
//include_once "../config/config.php";
//require_once '../config/config.php';
$item=10;
?>
<?php
  $sql="SELECT count(product_category) AS count,product_category FROM table_product GROUP BY product_category";
  $result = $connect->query($sql);

 ?>


  <div class="heading">
    <h3>PRODUCT</h3>

    <button class="btn category" type="button" onclick="show('all');">
      ทั้งหมด<span class="badge"></span>
    </button>
    <?php

    while ($row = $result->fetch_assoc()){
      if(isset($_GET['cat'])&&$row['product_category']==$_GET['cat'])$style="background-color:rgb(171, 32, 32);color:white;";
      else $style="";//เปลี่ยนสีปุ่มหมวดหมู่
       ?>
      <button class="btn category" type="button" onclick="show('<?php echo $row['product_category']; ?>');" style="<?php echo $style; ?>">
        <?php echo $row['product_category']; ?> <span class="badge"><?php echo $row['count']; ?></span>
      </button>
    <!--</a>-->
    <?php } ?>
  </div>
  <div class="container">


    <?php
      if(isset($_GET['cat'])&&$_GET['cat']!='all'){
          $sqlcount='SELECT Count(product_id) AS NumberOfProducts FROM table_product WHERE product_category="'.$_GET['cat'].'"';
      }
      else if(isset($_GET['serach'])){
        $sqlcount='SELECT Count(product_id) AS NumberOfProducts FROM table_product WHERE product_name LIKE "%'.$_GET['serachtext'].'%" OR product_desc LIKE "%'.$_GET['serachtext'].'%"';
      }
      else {
        $sqlcount='SELECT Count(product_id) AS NumberOfProducts FROM table_product';
      }
      $result= $connect->query($sqlcount);
      $result1=$result->fetch_assoc();
      $count=$result1['NumberOfProducts'];
      if(isset($_GET['page'])){
        $page=$_GET['page'];
      }
      else $page=0;
    ?>
    <?php if($count==0){?>
    <h2>cannot found</h2>
  <?php  } ?>
    <div class="row">
      <div class="col-xs-12 product">
    <?php
      if(isset($_GET['cat'])&&$_GET['cat']!='all'){
          $sql='SELECT * FROM table_product WHERE product_category="'.$_GET['cat'].'" LIMIT '.($page*$item).','.$item;
      }
      else if(isset($_GET['serach'])){
        $sql='SELECT * FROM table_product WHERE product_name LIKE "%'.$_GET['serachtext'].'%" OR product_desc LIKE "%'.$_GET['serachtext'].'%" LIMIT '.($page*$item).','.$item;
      }
      else {
        $sql='SELECT * FROM table_product LIMIT '.($page*$item).','.$item;
      }

     $query_select_product = $connect->query($sql);
    while ($select_product = $query_select_product->fetch_assoc()){
      $str='';
      if(isset($_SESSION['cart'])){
        $key = array_search($select_product['product_id'],$_SESSION['cart']);
        if ((string)$key != ""){
          $str='background-color:rgb(171, 32, 32);color:white;';
        }
       }

     ?>



        <div class="col-xs-6 col-sm-4 col-md-3 product">
        <div class='pic' style="background-image:url('<?php echo $select_product['product_picture'] ?>')">
            <br><button class="form-control buy <?php echo $select_product['product_id']; ?>" onclick="save('<?php echo $select_product['product_id'] ?>')" style="<?php echo $str; ?>">Add Cart</button>
        </div>
          <a href="product.php?id=<?php echo $select_product['product_id']; ?>">
        <div class="show">
           <div class="name"><?php echo $select_product['product_name']?></div>
           <div class="price"><h2><?php echo $select_product['product_price'] ?></h2></div>
         </div>
       </a>
      </div>

    <input type="hidden" name="product_id" value="<?php echo $select_product['product_id'] ?>">
    <input type="hidden" name="product_picture" value="<?php echo $select_product['pictur_product']; ?>">
    <input type="hidden" name="product_name" value="<?php echo $select_product['product_name']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $select_product['product_price']; ?>">

    <?php
    }
    ?>

      </div>

    </div>
  </div>
  <form class="" action="#" method="get">

    <nav aria-label="next" class="page">
      <ul class="pagination">
        <?php
        if(isset($_GET['cat'])){$str="cat=".$_GET['cat']."&";}
        else{$str="";}
        for($i=0;$i<=$count/($item-1);$i++){?>
        <li class="<?php if($i==$page)echo 'active'; ?>"><a href="<?php echo "listproduct.php?".$str."page=".$i;?>"><?php echo $i+1; ?> <span class="sr-only">(current)</span></a></li>

        <?php } ?>
      </ul>
    </nav>
  </form>
