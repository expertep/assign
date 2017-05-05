<?php
if (!isset($_SESSION['username'])){
?>
<div class="container">
  <?php
  if (isset($_POST['checklogin'])){
  $email = $_POST['email'];
  $password = $_POST['password'];


    $sql_member = 'SELECT * FROM table_member WHERE email = "'.$email.'" AND password = "'.$password.'"';
    $query_member = $connect->query($sql_member);


  if ($member = $query_member->fetch_assoc()){
  $_SESSION['user_status'] = $member['status'];
  $_SESSION['username'] = $member['username'];
  $_SESSION['emailuser'] = $email;
  header('Location:member/..');

  }

  else {

    ?>

  <div class="alert alert-danger" role="alert">ล้มเหลว! รหัสผ่านหรือไอดีไม่ถูกต้อง กรุณากรอกใหม่</div>
  <?php
  }

  }
?>
  <div class="row">
     <div class="col-xs-12 .col-sm-6 .col-md-8">
       <div class="col-xs-6 .col-sm-2">
         <form method="POST">
E-mail  : <input type="email" name="email" placeholder="Username" class="form-control" required><br>
Passwsord : <input type="password" name="password" placeholder="Password" class="form-control" required><br>
ลืมรหัสผ่าน? <br>
<input type="submit" name="checklogin" class="btn btn-default" value="ลงชื่อเข้าใช้">
        </form>
       </div>
       <div class="col-xs-6 .col-sm-2" style="border-left:2px solid black; ">
         <br><br>
         <br><br><br><br>
         <img src="image/facebook.png" style="width:150px; height:130px;">
         </div>
</div>
</div>
</div>
<?php
}
else {

header('Location:member/..');


}



 ?>
