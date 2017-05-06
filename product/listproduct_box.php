<div class="row">
  <div class="col-xs-12 product">
<?php

 $sql_select_product = 'SELECT * FROM table_product ';
 $query_select_product = $connect->query($sql_select_product);
while ($select_product = $query_select_product->fetch_assoc()){

 ?>
 <script type="text/javascript">

 function save(id) {
   var str="cart.php";
   $.ajax({
     type: 'POST',
     url: str,
     data: { id_product: id },
     success: function(response) {}
   });
 }
</script>



  <div class="col-xs-6 col-sm-4 col-md-3 product">
  <div class='pic'>
  <img src="<?php echo $select_product['picture_product'] ?>" class="img-responsive" alt="product">
  </div>
  <div class="show">
     <?php echo $select_product['name_product']?><br>
     <?php echo $select_product['price_product'] ?><br>
     <button class="form-control buy" onclick="save('<?php echo $select_product['id_product'] ?>')">สั่งซื้อ</button>
   </div>

</div>
<input type="hidden" name="id_product" value="<?php echo $select_product['id_product'] ?>">
<input type="hidden" name="picture_product" value="<?php echo $select_product['pictur_product']; ?>">
<input type="hidden" name="name_product" value="<?php echo $select_product['name_product']; ?>">
<input type="hidden" name="price_product" value="<?php echo $select_product['price_product']; ?>">





<?php

} ?>
</div>
</div>
