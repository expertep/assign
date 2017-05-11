<script type="text/javascript">
  var bool;//บอกว่ากดedit หรือ delete
</script>
  Product <br>
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
    $sql_select_product = 'SELECT * FROM table_product WHERE id_product LIKE "%'.$_POST['search'].'%"OR name_product LIKE "%'.$_POST['search'].'%"';
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
   <form class="" action="#" method="post" onsubmit="return check(<?php echo $select_product['id_product']; ?>);">
      <tr>
        <td>
          <?php echo $select_product['id_product']; ?>
        </td>
        <td>
          <input class="edit <?php echo $select_product['id_product']; ?>" type="text" name="name_product" value="<?php echo $select_product['name_product'] ?>" readonly>
        </td>
        <td>
          <input class="edit <?php echo $select_product['id_product']; ?>" type="text" name="price_product" value="<?php echo $select_product['price_product'] ?>" readonly>
        </td>
        <td>
          <input class="edit <?php echo $select_product['id_product']; ?>" type="text" name="category_product" value="<?php echo $select_product['category_product'] ?>" readonly>
        </td>
        <td>
          Image
        </td>
        <td>
          <input class="edit <?php echo $select_product['id_product']; ?>" type="text" name="unit_product" value="<?php echo $select_product['unit_product'] ?>" readonly>
        </td>
        <td>
          <input class="edit <?php echo $select_product['id_product']; ?>" type="text" name="number_product" value="<?php echo $select_product['number_product'] ?>" readonly>
        </td>
        <td>
          <button type="submit" name="edit" id="<?php echo $select_product['id_product']; ?>" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='e';">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </button>
          <button type="submit" name="delete" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='d';">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </button>
        </td>

      </tr>
      <input type="hidden" name="id_product" value="<?php echo $select_product['id_product']; ?>">
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
