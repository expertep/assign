<?php
require_once '../config/config.php';
  $cat='';
  if(isset($_POST['cat'])){
    $cat=$_POST['cat'];
  }
  $sql="SELECT product_type FROM table_product WHERE product_category='".$cat."' GROUP BY product_type";
  $result = $connect->query($sql);
 ?>
 ประเภท
 <select class="form-control" name="product_type" required>
   <option value="" id='text2'>please select</option>
     <?php
         while ($row = $result->fetch_assoc()) {
      ?>
   <option value="<?php echo $row['product_type'] ?>"><?php echo $row['product_type'] ?></option>
   <?php } ?>
 </select>
