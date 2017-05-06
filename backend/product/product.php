<div class="container">
  Product <br>
  <div class="form-group">
  <span>  <input type="text" class="form-control" placeholder="Search">
    <button type="submit" class="btn btn-default">ค้นหา</button> </span>
  </div>

  <br>


  <?php

 //if () ถ้า product == NULL ให้โชว์ว่า ไม่มีสินค้า!

 //else {}

?>

<table class="table" style="border:1px solid black;">
  <tr>
    <th>
      รหัสสินค้า
    </th>
    <th>
      รูปสินค้า
    </th>
    <th>
      สถานะสินค้า
    </th>
    <th>
      ชื่อสินค้า
    </th>
    <th>
      ราคา
    </th>
    <th>
     Action
   </th>
  </tr>
  <?php
  $sql_select_product = 'SELECT * FROM table_product ';
  $query_select_product = $connect->query($sql_select_product);
 while ($select_product = $query_select_product->fetch_assoc()){
   ?>
  <tr>
    <td>
      <?php echo $select_product['id_product'] ?>
    </td>
    <td>
      Image
    </td>
    <td>
      Status
    </td>
    <td>
      <?php echo $select_product['name_product'] ?>
    </td>
    <td>
      Price
    </td>
    <td>
      Edit / Delete
    </td>

  </tr>
  <?php } ?>
</table>
</div>
