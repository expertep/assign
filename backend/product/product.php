
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
      <input class="name edit <?php echo $select_product['id_product'] ?>" type="text" name="" value="<?php echo $select_product['name_product'] ?>" readonly>

    </td>
    <td>
      <?php echo $select_product['price_product'] ?>
    </td>
    <td>
      <script type="text/javascript">
        function edit(row){
          if($("#"+row+" span").attr('class')=='glyphicon glyphicon-pencil'){
            $("#"+row+" span").attr('class','glyphicon glyphicon-floppy-disk');
            $(".edit."+row).removeAttr("readonly");
          }
          else{
            $("#"+row+" span").attr('class','glyphicon glyphicon-pencil');
            $(".edit."+row).attr("readonly","");
            var str="save.php";
            $.ajax({
              type: 'POST',
              url: str,
              data: {
                name_product:$(".name.edit."+row).val()
             },
              success: function(response) {}
            });
            //alert($(".name.edit."+row).val());
          }

        }

      </script>
      <button type="button" id="<?php echo $select_product['id_product'] ?>" class="btn btn-default btn-sm" aria-label="Left Align" onclick="edit(<?php echo $select_product['id_product'] ?>)">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </button>
      <button type="button" class="btn btn-default btn-sm" aria-label="Left Align">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </button>
    </td>

  </tr>
  <?php } ?>
</table>
