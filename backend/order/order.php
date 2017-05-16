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
      slip
    </th>
    <th>
     Action
   </th>
  </tr>
  <?php
  include 'save.php';

  $result = $connect->query($sql_select_product);
  $result2 = $connect->query($sql_select_product);
  //เก็บค่าrowspanแต่ละชุด
   while ($row = $result->fetch_assoc()){
     if(!isset($rowspan[$row['order_id']])){
       $rowspan[$row['order_id']]=0;
     }
     $rowspan[$row['order_id']]+=1;
   }

 while ($row = $result2->fetch_assoc()){
   ?>
   <form class="" action="#" method="post" >
      <tr>
      <?php if($rowspan[$row['order_id']]!=0){ ?>
        <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
          <?php echo $row['order_id']; ?>
        </td>
        <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
          <?php echo $row['member_id']; ?>
        </td>
        <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
          <?php echo $row['date'];} ?>
        </td>
        <td>
          <?php echo $row['product_id']; ?>
        </td>
        <td>
          <?php echo $row['name_product']; ?>
        </td>
        <td>
          <?php echo $row['amount']; ?>
        </td>
        <?php if($rowspan[$row['order_id']]!=0){ ?>
        <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
          <?php echo $row['pay']; ?>
        </td>
        <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
          <?php if($row['payslip']!=""){ ?>
          <img style="width:40px;height:auto;" class="slip" src="<?php echo $row['payslip']; ?>" alt="">
          <?php } ?>
        </td>
        <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>

          <button type="submit" name="sent" id="<?php echo $row['order_id']; ?>" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='e';">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          </button>
          <button type="submit" name="cancel" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='d';">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
          <?php $rowspan[$row['order_id']]=0; }?>
        </td>

      </tr>
      <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
     </form>
  <?php
    }
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
