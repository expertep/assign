<?php
if (isset($_POST['discount'])){

  $discount = $_POST['discount'];
  $percent = $_POST['percent'];
  $date = $_POST['date'];
  $status = '1';

  $sql_insert_discount = 'INSERT INTO table_discount (Code_Discount,Percent_Discount,Start_Discount,End_Discount,Status_Discount)
   VALUES ("'.$discount.'","'.$percent.'",NOW(),"'.$date.'","'.$status.'") ';
   $query_insert_discount = $connect->query($sql_insert_discount);

   if ($query_insert_discount){
     echo '<div class="alert alert-success" role="alert">สำเร็จ! เพิ่มโค๊ดส่วนลด เรียบร้อย!</div>';
   }



}




 ?>

<table class="table">
  <tr>
    <th>ไอดี</th>
    <th>ชื่อส่วนลด</th>
    <th>เปอเซ็นต์ลด</th>
    <th>วันเริ่ม</th>
    <th>วันสิ้นสุด</th>
    <th>สถานะ</th>
  </tr>
  <?php
  $select_discount = 'SELECT * FROM table_discount';
  $query_discount = $connect->query($select_discount);

  while ($select_discount = $query_discount->fetch_assoc()){



   ?>
  <tr>
    <td><?php echo $select_discount['ID_Discount']; ?></td>
    <td><?php echo $select_discount['Code_Discount']; ?></td>
    <td><?php echo $select_discount['Percent_Discount']; ?></td>
    <td><?php echo $select_discount['Start_Discount']; ?></td>
    <td><?php echo $select_discount['End_Discount']; ?></td>
    <td>
      <?php
      if ($select_discount['Status_Discount'] == '1'){
      echo "เปิดใช้งาน";
      }
      else if ($select_discount['Status_Discount'] == '0'){
      echo "หมดอายุ";
      }
      ?>
    </td>
  </tr>

  <?php
    }

   ?>
</table>

<?php
$datetime1 = date_create('2018-05-29');
$datetime2 = date_create('2018-05-29');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%R%a');

if ($interval->format('%a') == '0'){
  echo "this day";
}
?>



<form method="POST">
โค๊ดส่วนลด : <input type="text" name="discount" class="form-control" placeholder="ระบุส่วนลด" required><br>
เปอร์เซ็นลด : <input type="number" name="percent" class="form-control" placeholder="เปอร์เซ็นลด ตัวอย่าง 10" min="1" max="100" required>
ลดถึงวันที่ : <input type="date" name="date" class="form-control" placeholder="ลดถึงวันที่" required>
<button class="form-control">เพิ่มโค๊ดส่วนลด</button>
</form>
