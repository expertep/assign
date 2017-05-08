<div class="container">

<table class="table">
  <tr>
    <th>หมายเลขสั่งซื้อ </th>
  <th>ชื่อสินค้า</th>
    <th>ราคา </th>
    <th>จำนวน</th>
    <th>สถานะ</th>
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
    <td> <?php echo $row['status']; ?> </td>
  </tr>
<?php } ?>
</table>

</div>
