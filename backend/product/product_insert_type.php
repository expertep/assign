<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "a0879804209";
$db_name = "assignment";
$connect = new mysqli($db_host,$db_username,$db_password,$db_name);
$connect->query('SET names utf8');
if($connect->connect_errno){
  $connect->connect_error;
}
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
