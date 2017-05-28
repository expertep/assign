<script type="text/javascript">
  var bool;//บอกว่ากดedit หรือ delete
</script>
  <h1>Order</h1>
  <form class="" action="" method="GET">
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" name='search' class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">ค้นหา</button>
          </span>
          <input type="hidden" name="action" value="member">
        </div>
      </div>
    </div>
  </form>

  <br>

  <?php
  if(isset($_GET['search'])){
    $sql_select_product = 'SELECT * FROM table_order torder
INNER JOIN table_bill tbill ON torder.order_id=tbill.order_id
INNER JOIN table_product tpro ON tbill.product_id=tpro.product_id
INNER JOIN table_member tmem ON torder.member_id=tmem.member_id WHERE pay="s"OR pay="f" AND (torder.order_id LIKE "%'.$_GET['search'].'%"OR torder.date LIKE "%'.$_GET['search'].'%")';
  }
  else{
    $sql_select_product = 'SELECT * FROM table_order torder
INNER JOIN table_bill tbill ON torder.order_id=tbill.order_id
INNER JOIN table_product tpro ON tbill.product_id=tpro.product_id
INNER JOIN table_member tmem ON torder.member_id=tmem.member_id WHERE pay="s"OR pay="f"';
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
    <!--<th>
     Action
   </th>-->
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
          <a href="?action=member&search=<?php echo $row['member_id']; ?>"><?php echo $row['member_id']; ?></a>
        </td>
        <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
          <?php echo $row['date'];} ?>
        </td>
        <td>
          <a href="?action=product&search=<?php echo $row['product_name']; ?>"><?php echo $row['product_id']; ?></a>
        </td>
        <td>
          <?php echo $row['product_name']; ?>
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
            <a href="<?php echo $row['payslip']; ?>" target="_blank">
              <img style="width:40px;height:auto;" class="slip" src="<?php echo $row['payslip']; ?>" alt="">
            </a>
          <?php } ?>
        </td>

<?php $rowspan[$row['order_id']]=0; }?>
      </tr>
      <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
     </form>
  <?php
    }
?>
</table>
w=wait s=sent f=fail
