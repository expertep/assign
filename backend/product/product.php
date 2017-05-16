<script type="text/javascript">
  var bool;//บอกว่ากดedit หรือ delete
</script>
  <h1>Product</h1>
  <form class="" action="#" method="POSt">

    <div class="form-group">
    <span>
      <input type="text" name='search' class="form-control" placeholder="Search">
      <button type="submit" name='searchb' class="btn btn-default">ค้นหา</button>
    </span>
    </div>
  </form>

  <br>

  <?php
  if(isset($_POST['searchb'])){
    $sql_select_product = 'SELECT * FROM table_product WHERE product_id LIKE "%'.$_POST['search'].'%"OR product_name LIKE "%'.$_POST['search'].'%"';
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
      หน่วย
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
          <input class="edit <?php echo $select_product['product_id']; ?>" type="text" name="product_name" value="<?php echo $select_product['product_name'] ?>" readonly>
        </td>
        <td>
          <input class="edit <?php echo $select_product['product_id']; ?>" type="text" name="product_price" value="<?php echo $select_product['product_price'] ?>" readonly>
        </td>
        <td>
          <input class="edit <?php echo $select_product['product_id']; ?>" type="text" name="product_category" value="<?php echo $select_product['product_category'] ?>" readonly>
        </td>
        <td>
          <img class="edit img" src="../<?php echo $select_product['product_picture']; ?>" alt="">
        </td>
        <td>
          <input class="edit <?php echo $select_product['product_id']; ?>" type="text" name="unit_product" value="<?php echo $select_product['product_picture'] ?>" readonly>
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





<script type="text/javascript">// เปลี่ยนรูปปุ่มedit
  function check(row){
    if(bool=='e'){
      if($("#"+row+" span").attr('class')=='glyphicon glyphicon-pencil'){
        $("#"+row+" span").attr('class','glyphicon glyphicon-floppy-disk');
        $(".edit."+row).removeAttr("readonly");
        return false;
      }
      else{
        $("#"+row+" span").attr('class','glyphicon glyphicon-pencil');
        $(".edit."+row).attr("readonly","");
        return true;
      }
      return false;
    }
    else return true;
  }

</script>
