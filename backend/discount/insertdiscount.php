<?php
if (isset($_POST['discount'])){



}

 ?>
<table class="table">
  <tr>
    <th>ไอดี</th>
    <th>ชื่อส่วนลด</th>
    <th>เปอเซ็นต์ลด</th>
    <th>วันเริ่ม</th>
    <th>วันสิ้นสุด</th>
  </tr>
  <tr>
    <td>0001</td>
    <td>20PERCENT</td>
    <td>20%</td>
    <td>10-20-2560</td>
    <td>10-31-2560</td>
  </tr>
</table>



<form method="POST">
โค๊ดส่วนลด : <input type="text" name="discount" class="form-control" placeholder"ระบุส่วนลด" required>

<button class="form-control">เพิ่มโค๊ดส่วนลด</button>
</form>
