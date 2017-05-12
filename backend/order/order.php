<script type="text/javascript">
  var bool;//บอกว่ากดedit หรือ delete
</script>
  <h1>Order</h1>
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
    $sql_select_product = 'SELECT * FROM table_order torder
INNER JOIN table_bill tbill ON torder.order_id=tbill.order_id
INNER JOIN table_product tpro ON tbill.product_id=tpro.id_product
INNER JOIN table_member tmem ON torder.member_id=tmem.member_id WHERE torder.order_id LIKE "%'.$_POST['search'].'%"OR torder.date LIKE "%'.$_POST['search'].'%"';
  }
  else{
    $sql_select_product = 'SELECT * FROM table_order torder
INNER JOIN table_bill tbill ON torder.order_id=tbill.order_id
INNER JOIN table_product tpro ON tbill.product_id=tpro.id_product
INNER JOIN table_member tmem ON torder.member_id=tmem.member_id';
  }

?>

<table class="table" style="border:1px solid black;">
  <tr>
    <th>
      รหัสการสั่ง
    </th>
    <th>
      รหัสลูกค้า
    </th>
    <th>
      วันที่
    </th>
    <th>
      รหัสสินค้า
    </th>
    <th>
      ชื่อสินค้า
    </th>
    <th>
      จำนวน
    </th>
    <th>
      สถานะ
    </th>
    <th>
     Action
   </th>
  </tr>
  <?php
  include 'save.php';

  $query_select_product = $connect->query($sql_select_product);

  $tmp="";//สำหรับจัดตารางให้เป็นgroup
 while ($select_product = $query_select_product->fetch_assoc()){

   ?>
   <form class="" action="#" method="post" >
     <?php  ?>
      <tr>
        <td>
          <?php if($select_product['order_id']!=$tmp){echo $select_product['order_id'];} ?>
        </td>
        <td>
          <?php if($select_product['order_id']!=$tmp){echo $select_product['member_id'];} ?>
        </td>
        <td>
          <?php if($select_product['order_id']!=$tmp){echo $select_product['date'];} ?>
        </td>
        <td>
          <?php echo $select_product['product_id']; ?>
        </td>
        <td>
          <?php echo $select_product['name_product']; ?>
        </td>
        <td>
          <?php echo $select_product['amount']; ?>
        </td>
        <td>
          <?php if($select_product['order_id']!=$tmp){echo $select_product['pay'];} ?>
        </td>
        <td>
          <?php if($select_product['order_id']!=$tmp){?>
          <button type="submit" name="sent" id="<?php echo $select_product['order_id']; ?>" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='e';">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          </button>
          <button type="submit" name="cancel" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='d';">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
          <?php } ?>
        </td>

      </tr>
      <input type="hidden" name="order_id" value="<?php echo $select_product['order_id']; ?>">
     </form>
  <?php
    $tmp=$select_product['order_id'];
    }
//}
?>
</table>
w=wait s=sent f=fail




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
