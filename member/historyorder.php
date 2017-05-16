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
   INNER JOIN table_product ON table_product.id_product=table_bill.product_id
  WHERE table_order.member_id = "'.$_SESSION['id'].'"';
  $query = $connect->query($sql);
  while($row = $query->fetch_assoc()) {
   ?>
  <tr>
    <td> <?php echo $row['order_id']; ?></td>
    <td> <?php echo $row['name_product']; ?> </td>
    <td> <?php echo $row['product_id']; ?> </td>
    <td> <?php echo $row['amount']; ?> </td>
    <td> <?php echo $row['pay']; ?> </td>
    <td>
      <form class="" action="checkout/paied.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileupload" class="form-control">
        <button type="submit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
          Upload
        </button>
        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
      </form>
  </td>
  </tr>
<?php } ?>
</table>

</div>
