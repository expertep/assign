<?php
if (isset($_POST['product_price'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_category = $_POST['product_category'];
   $product_type = $_POST['product_type'];
   $product_number = $_POST['product_number'];
   $sale_product = $_POST['sale_product'];
   $product_desc = $_POST['product_desc'];
   $target_dir = "../product/image/";
   $randomfile = 1;
   $insert_picture = "product/image/";
//while ($randomfile != 0){

$randomfile = rand(1,999999);
$target_file = $target_dir.$randomfile.$_FILES["fileupload"]["name"];
$insert_picture = $insert_picture.$randomfile.$_FILES["fileupload"]["name"];
//ทำการ random ชื่อแล้ว เช็คใน db ว่ามีการซ้ำรึไม่
//}
$product_desc=str_replace("\"","\"\"",$product_desc);
if(copy($_FILES['fileupload']['tmp_name'], $target_file)){

   $sql_insert_product = 'INSERT INTO table_product (product_name,product_price,product_category,product_type,product_picture,product_number,product_desc) VALUES
   ("'.$product_name.'","'.$product_price.'","'.$product_category.'","'.$product_type.'","'.$insert_picture.'","'.$product_number.'","'.$product_desc.'") ';
   echo $sql_insert_product;
   $query_insert_product = $connect->query($sql_insert_product);
   if ($query_insert_product){
     echo "อัพเดทสินค้าสำเร็จ";

   }
}
}

 ?>
<script type="text/javascript">
  $(document).ready(function(){

  $( "#cat" ).keyup(function() {
    var value = $( this ).val();
    $('#text1').text(value);
    $('#text1').attr('value',value);
  })
  .keyup();

  $( "#type" ).keyup(function() {
    var value = $( this ).val();
    $('#text2').text(value);
    $('#text2').attr('value',value);
  })
  .keyup();
})

function typeselect() {
  var x = document.getElementById("catselect");
  var i = x.selectedIndex;
  var str = x.options[i].text;
      $.ajax({
         type: "POST",
         url: '\product/product_insert_type.php',
         data: "cat=" + str, // appears as $_GET['id'] @ your backend side
         success: function(data) {
           $('#typeselect').html(data);
         }
       });
}

</script>
<form method="POST" enctype="multipart/form-data">
  <div class="row">

    <div class="col-xs-6 col-md-6">ชื่อสินค้า <input type="text" name="product_name" class="form-control" placeholder="ชื่อสินค้า" required></div>
    <div class="col-xs-6 col-md-6">ราคา <input type="text" name="product_price" class="form-control" placeholder="100.00" required></div>
    <div class="col-xs-3 col-md-3">หมวดหมู่ - เพิ่ม
      <input type="text" id='cat' class="form-control" placeholder="หมวดหมู่">
    </div>
    <div class="col-xs-3 col-md-3">หมวดหมู่
    <select class="form-control" id='catselect' name="product_category" onchange="typeselect()" required>
      <option value="" id='text1'>dsa d</option>
        <?php $sql='SELECT product_category FROM table_product GROUP BY product_category';
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
         ?>
      <option value="<?php echo $row['product_category'] ?>"><?php echo $row['product_category'] ?></option>
      <?php } ?>
    </select>
      </div>
      <div class="col-xs-3 col-md-3">ประเภท - เพิ่ม
        <input type="text" id='type' class="form-control" placeholder="หมวดหมู่">
      </div>
      <div class="col-xs-3 col-md-3" id="typeselect">
        <?php include 'product_insert_type.php' ?>
        </div>
          <div class="col-xs-6 col-md-6">รูปสินค้า <input type="file" name="fileupload" class="form-control" required></div>
            <div class="col-xs-6 col-md-6">จำนวนสินค้า <input type="text" name="product_number" class="form-control"  required></div>
              <div class="col-xs-6 col-md-6">สินค้าลดราคา <input type="text" name="sale_product" class="form-control" ></div>

                <div class="col-xs-12 col-md-12">คำอธิบาย <textarea class="form-control" name="product_desc"></textarea></div>
                <div class="col-xs-12 col-md-12 btn-sm"><center>
                  <button class="btn btn-primary">เพิ่มสินค้า!</button>
                </center>
                </div>
  </div>
</form>
<?php  //echo str_replace("\"","\"\"","ผลิตจาก สแตนเลสเกรด 304 พื้นผิวไม่หลุกลอก มีฟิลเตอร์ประหยัดน้ำ 15" x 5" x 5""); ?>
