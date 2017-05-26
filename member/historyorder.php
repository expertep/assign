<div class="jumbotron his">

<table class="table his">
  <tr>
    <th>หมายเลขสั่งซื้อ </th>
  <th>ชื่อสินค้า</th>
    <th>ราคา </th>
    <th>จำนวน</th>
    <th>สถานะ</th>
    <th>upload</th>
  </tr>
  <?php
  $sql = 'SELECT * FROM table_order
   INNER JOIN table_bill ON table_order.order_id=table_bill.order_id
   INNER JOIN table_product ON table_product.product_id=table_bill.product_id
  WHERE table_order.member_id = "'.$_SESSION['id'].'"';
  $query = $connect->query($sql);
  $result = $connect->query($sql);
  while ($row = $result->fetch_assoc()){
    if(!isset($rowspan[$row['order_id']])){
      $rowspan[$row['order_id']]=0;
    }
    $rowspan[$row['order_id']]+=1;
  }

  while($row = $query->fetch_assoc()) {
   ?>
  <tr>
    <?php if($rowspan[$row['order_id']]!=0){ ?>
      <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
        <?php echo $row['order_id']; }?>
      </td>
      <td>
        <?php echo $row['product_name']; ?>
      </td>
      <td>
        <?php echo $row['product_price']; ?>
      </td>
      <td>
        <?php echo $row['amount']; ?>
      </td>
      <?php if($rowspan[$row['order_id']]!=0){ ?>
      <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
        <?php switch($row['pay']){
          case 'w':echo 'รอ';break;
          case 's':echo 'ส่งแล้ว';break;
          case 'f':echo 'ล้มเหลว';break;
        } ?>
      </td>
      <td rowspan=<?php echo '"'.$rowspan[$row['order_id']].'"'; ?>>
      <?php if($row['pay']!='s'){ ?>
      <form class="" action="checkout/paied.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileupload" class="form-control">
        <button type="submit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
          Upload
        </button>
        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
      </form>
      <?php }?>
      <?php $rowspan[$row['order_id']]=0; }?>
    </td>
    <?php //} ?>
  </tr>
<?php } ?>
</table>

</div>
