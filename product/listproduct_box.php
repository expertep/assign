<?php
include_once "\../config/config.php" ?>
<script type="text/javascript">

function save(id) {

    $(".price."+id).css("background-color","green");

  document.getElementById("count").innerHTML =1+parseInt(document.getElementById("count").innerHTML);
  var str="cart.php";
  $.ajax({
    type: 'POST',
    url: str,
    data: { id_product: id },
    success: function(response) {}
  });
}
</script>
<div class="row">
  <div class="col-xs-12 product">
<?php
  $sql='SELECT Count(id_product) AS NumberOfProducts FROM table_product';
  $result= $connect->query($sql);
  $result1=$result->fetch_assoc();
  $count=$result1['NumberOfProducts'];
  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }
  else $page=1;
 $sql_select_product = 'SELECT * FROM table_product LIMIT '.($page*10).',10';
 $query_select_product = $connect->query($sql_select_product);
while ($select_product = $query_select_product->fetch_assoc()){

 ?>

<script type="text/javascript">

</script>
  <div class="col-xs-6 col-sm-4 col-md-3 product">
  <div class='pic' style="background-image:url('<?php echo $select_product['picture_product'] ?>')">
<style media="screen">
  .name{width:70%;display: inline-block;}
  .price{width:20%;display: inline-block;}
</style>
  </div>
  <div class="show">
     <div class="name"><?php echo $select_product['name_product']?></div>
     <?php
     $str='';
     if(isset($_SESSION['cart'])){
       $key = array_search($select_product['id_product'],$_SESSION['cart']);
       if ((string)$key != ""){
         $str='background-color:green;';
       }
      }
     ?>
     <div class="price <?php echo $select_product['id_product'] ?>" style="<?php echo $str; ?>"><?php echo $select_product['price_product'] ?></div>
     <button class="form-control buy" onclick="save('<?php echo $select_product['id_product'] ?>')">สั่งซื้อ</button>
   </div>

</div>
<input type="hidden" name="id_product" value="<?php echo $select_product['id_product'] ?>">
<input type="hidden" name="picture_product" value="<?php echo $select_product['pictur_product']; ?>">
<input type="hidden" name="name_product" value="<?php echo $select_product['name_product']; ?>">
<input type="hidden" name="price_product" value="<?php echo $select_product['price_product']; ?>">





<?php

}
?>

  </div>

</div>
