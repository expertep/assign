<script type="text/javascript">
  var bool;//บอกว่ากดedit หรือ delete
</script>
  <h1>Product</h1>
  <form class="" action="" method="GET">
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" name='search' class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">ค้นหา</button>
          </span>
          <input type="hidden" name="action" value="product">
        </div>
      </div>
    </div>
  </form>

  <br>

  <?php
  if(isset($_GET['search'])){
    $sql_select_product = 'SELECT * FROM table_product WHERE product_id LIKE "%'.$_GET['search'].'%"OR product_name LIKE "%'.$_GET['search'].'%"';
  }
  else{
    $sql_select_product = 'SELECT * FROM table_product ';
  }

?>

<table class="table" style="border:1px solid black;">
  <tr>
    <th>
      รหัส
    </th>
    <th>
      ชื่อ
    </th>
    <th>
      ราคา
    </th>
    <th>
      ประเภท
    </th>
    <th>
      รูป
    </th>
    <th>
      รายละเอียด
    </th>
    <th>
      จำนวน
    </th>
    <th>
     Action
   </th>
  </tr>
  <?php
  include 'save.php';

  $query_select_product = $connect->query($sql_select_product);
  //if ($query_select_product->num_rows > 0) {
 while ($select_product = $query_select_product->fetch_assoc()){
   ?>
   <form class="" action="#" method="post" onsubmit="return check(<?php echo $select_product['product_id']; ?>);">
      <tr>
        <td>
          <?php echo $select_product['product_id']; ?>
        </td>
        <td>
          <textarea rows="4" class="edit text <?php echo $select_product['product_id']; ?>" name="product_name" readonly><?php echo $select_product['product_name'] ?></textarea>
        </td>
        <td>
          <input class="edit <?php echo $select_product['product_id']; ?>" type="text" name="product_price" value="<?php echo $select_product['product_price'] ?>" readonly>
        </td>
        <td>
          <input class="edit <?php echo $select_product['product_id']; ?>" type="text" name="product_category" value="<?php echo $select_product['product_category'] ?>" readonly>
        </td>
        <td>
          <a href="../<?php echo $select_product['product_picture']; ?>" target="_blank">
            <img class="edit img" src="../<?php echo $select_product['product_picture']; ?>" alt="">
          </a>
        </td>
        <td>
          <textarea rows="4" class="edit text <?php echo $select_product['product_id']; ?>" name="product_desc" readonly><?php echo $select_product['product_desc'] ?></textarea>
        </td>
        <td>
          <input class="edit <?php echo $select_product['product_id']; ?>" type="text" name="product_number" value="<?php echo $select_product['product_number'] ?>" readonly>
        </td>
        <td>
          <button type="submit" name="edit" id="<?php echo $select_product['product_id']; ?>" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='e';">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </button>
          <button type="submit" name="delete" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='d';">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </button>
        </td>

      </tr>
      <input type="hidden" name="product_id" value="<?php echo $select_product['product_id']; ?>">
     </form>
  <?php }
//}
?>
</table>
