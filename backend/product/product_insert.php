<?php
if (isset($_POST['price_product'])){

$name_product = $_POST['name_product'];
 $price_product = $_POST['price_product'];
 $category_product = $_POST['category'];
 $type_product = $_POST['type_product'];
 $unit = $_POST['unit'];
 $number_product = $_POST['number_product'];
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

   $sql_insert_product = 'INSERT INTO table_product (name_product,price_product,category_product,type_product,picture_product,unit_product,number_product) VALUES
   ("'.$name_product.'","'.$price_product.'","'.$category_product.'","'.$type_product.'","'.$insert_picture.'","'.$unit.'","'.$number_product.'") ';

   $query_insert_product = $connect->query($sql_insert_product);
   if ($query_insert_product){
     echo "อัพเดทสินค้าสำเร็จ";
   }
}
}

 ?>

<form method="POST" enctype="multipart/form-data">
  <div class="row">

    <div class="col-xs-6 col-md-6">ชื่อสินค้า <input type="text" name="name_product" class="form-control" placeholder="ชื่อสินค้า" required></div>
    <div class="col-xs-6 col-md-6">ราคา <input type="text" name="price_product" class="form-control" placeholder="100.00" required></div>
      <div class="col-xs-6 col-md-6">หมวดหมู่
    <select class="form-control" name="category">
      <option>หมวดหมู่1</option>
      <option>หมวดหมู่2</option>
      <option>หมวดหมู่3</option>
    </select>
      </div>
        <div class="col-xs-6 col-md-6">ประเภท
          <select  class="form-control" name="type_product">
            <option>หมวดหมู่1</option>
            <option>หมวดหมู่2</option>
            <option>หมวดหมู่3</option>
          </select>
        </div>
          <div class="col-xs-6 col-md-6">รูปสินค้า <input type="file" name="fileupload" class="form-control" ></div>
          <div class="col-xs-6 col-md-6">หน่วย
            <select  class="form-control" name="unit">
              <option>หมวดหมู่1</option>
              <option>หมวดหมู่2</option>
              <option>หมวดหมู่3</option>
            </select>

          </div>
            <div class="col-xs-6 col-md-6">จำนวนสินค้า <input type="text" name="number_product" class="form-control"  required></div>
              <div class="col-xs-6 col-md-6">สินค้าลดราคา <input type="text" name="sale_product" class="form-control"  required></div>

                <div class="col-xs-12 col-md-12">คำอธิบาย <textarea class="form-control"> </textarea></div><br>
                  <div class="col-xs-4 col-md-4">  </div>
            <div class="col-xs-4 col-md-4">  <button class="form-control" >เพิ่มสินค้า!</button> </div>
            <div class="col-xs-4 col-md-4"> </div>
  </div>
</form>
