


<div class="container">
  <?php




  if(isset($_POST['register'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $email = $_POST['email'];
  $status = "0";
//  $register_date = NOW();

  $sql_member = 'SELECT * FROM table_member WHERE username = "'.$username.'" ';
  $query_member = $connect->query($sql_member);
   $member = $query_member->fetch_assoc();
  if ($member['username'] == $username){
    ?>

  <div class="alert alert-danger" role="alert">ล้มเหลว! Username ถูกใช้งานแล้ว</div>
  <?php


  }
  else {

  if ($password == $cpassword){
    $sql_insert_member = 'INSERT INTO table_member (username,password,email,date_register,status) VALUES  ("'.$username.'","'.$password.'","'.$email.'",NOW(),"'.$status.'") ';
    $query_insert_member = $connect->query($sql_insert_member);
    if ($query_insert_member){
    ?>

  <div class="alert alert-success" role="alert">สำเร็จ! สมัครสมาชิกเรียบร้อย!</div>

  <?php
  $_SESSION['username'] = $username;
  header("Refresh:3; url=member/..");
  }
  else {
    echo "ส่งค่าไม่สำเร็จ";
  }
}
  else {
    ?>

  <div class="alert alert-danger" role="alert">ล้มเหลว! รหัสผ่านไม่ตรงกันกรุณากรอกใหม่</div>
  <?php
  }
   }
  }
   ?>
  <form method="post">
 Username : <br>
 <input type="text" name="username" class="form-control" placeholder="Username" <?php if (isset($_POST['register'])){ ?>value="<?php echo $_POST['username']; ?>"<?php } ?> required><br>
 Password : <br>
 <input type="password" name="password" class="form-control" placeholder="Password" required><br>
 Confirm Password : <br>
 <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required><br>
 E-mail : <br>
 <input type="email" name="email"  class="form-control" placeholder="E-mail" <?php if (isset($_POST['register'])){ ?>value="<?php echo $_POST['email']; ?>"<?php } ?> required><br>
  <input type="checkbox" name="checkrule" required>  ยอมรับข้อตกลง <br><br>
 <input type="submit" name="register" class="btn btn-default" value="ส่งข้อมูล">
 </form>
</div>
