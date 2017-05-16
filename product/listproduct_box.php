<?php
include_once "\../config/config.php" ?>
<script type="text/javascript">

function save(id) {
    $(".buy."+id).css({"background-color":"rgb(171, 32, 32)","color":"#FFFFFF"});

  document.getElementById("count").innerHTML =1+parseInt(document.getElementById("count").innerHTML);
  var str="cart.php";
  $.ajax({
    type: 'POST',
    url: str,
    data: { product_id: id },
    success: function(response) {}
  });
}
</script>
<div class="row">
  <div class="col-xs-12 product">
<?php
  if(isset($_GET['cat'])){
      $sql='SELECT Count(product_id) AS NumberOfProducts FROM table_product WHERE product_category="'.$_GET['cat'].'"';
  }
  else {$sql='SELECT Count(product_id) AS NumberOfProducts FROM table_product';}

  $result= $connect->query($sql);
  $result1=$result->fetch_assoc();
  $count=$result1['NumberOfProducts'];
  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }
  else $page=0;
  if(isset($_GET['cat'])){
      $sql='SELECT * FROM table_product WHERE product_category="'.$_GET['cat'].'" LIMIT '.($page*10).',10';
  }
  else {$sql='SELECT * FROM table_product LIMIT '.($page*10).',10';}
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
      <button class="form-control buy <?php echo $select_product['product_id']; ?>" onclick="save('<?php echo $select_product['product_id'] ?>')" style="<?php echo $str; ?>">Add Cart</button>
  </div>
  <div class="show">
     <div class="name"><?php echo $select_product['product_name']?></div>
     <div class="price"><h3><?php echo $select_product['product_price'] ?></h3></div>
   </div>

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
