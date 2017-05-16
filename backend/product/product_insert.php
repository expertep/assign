<?php
if (isset($_POST['product_price'])){

$product_name = $_POST['product_name'];
 $product_price = $_POST['product_price'];
 $product_category = $_POST['category'];
 $product_number = $_POST['product_number'];
 $sale_product = $_POST['sale_product'];

$target_dir = "../product/image/";
$randomfile = 1;
$insert_picture = "product/image/";
//while ($randomfile != 0){

$randomfile = rand(1,999999);
$target_file = $target_dir.$randomfile.$_FILES["fileupload"]["name"];
$insert_picture = $insert_picture.$randomfile.$_FILES["fileupload"]["name"];
//ทำการ random ชื่อแล้ว เช็คใน db ว่ามีการซ้ำรึไม่
//}

if(copy($_FILES['fileupload']['tmp_name'], $target_file)){

  echo "อัพเดทสำเร็จ";

   $sql_insert_product = 'INSERT INTO table_product (product_name,product_price,product_category,product_picture,product_number) VALUES
   ("'.$product_name.'","'.$product_price.'","'.$product_category.'","'.$insert_picture.'","'.$product_number.'") ';

   $query_insert_product = $connect->query($sql_insert_product);
   if ($query_insert_product){
     echo "อัพเดทสินค้าสำเร็จ";
   }
}
}

 ?>

<form method="POST" enctype="multipart/form-data">
  <div class="row">

    <div class="col-xs-6 col-md-6">ชื่อสินค้า <input type="text" name="product_name" class="form-control" placeholder="ชื่อสินค้า" required></div>
    <div class="col-xs-6 col-md-6">ราคา <input type="text" name="product_price" class="form-control" placeholder="100.00" required></div>
      <div class="col-xs-6 col-md-6">หมวดหมู่
    <select class="form-control" name="category">
      <option>หมวดหมู่1</option>
      <option>หมวดหมู่2</option>
      <option>หมวดหมู่3</option>
    </select>
      </div>
          <div class="col-xs-6 col-md-6">รูปสินค้า <input type="file" name="fileupload" class="form-control" ></div>
            <div class="col-xs-6 col-md-6">จำนวนสินค้า <input type="text" name="product_number" class="form-control"  required></div>
              <div class="col-xs-6 col-md-6">สินค้าลดราคา <input type="text" name="sale_product" class="form-control"  required></div>

                <div class="col-xs-12 col-md-12">คำอธิบาย <textarea class="form-control"> </textarea></div><br>
                  <div class="col-xs-4 col-md-4">  </div>
            <div class="col-xs-4 col-md-4">  <button class="form-control" >เพิ่มสินค้า!</button> </div>
            <div class="col-xs-4 col-md-4"> </div>
  </div>
</form>
