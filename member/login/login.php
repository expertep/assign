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
    $_SESSION['id'] = $member['member_id'];
  $_SESSION['user_status'] = $member['status'];
  $_SESSION['username'] = $member['username'];
  $_SESSION['password'] = $member['password'];
  $_SESSION['firstname'] = $member['firstname'];
  $_SESSION['lastname'] = $member['lastname'];
  $_SESSION['address'] = $member['address'];
  $_SESSION['emailuser'] = $member['email'];
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
<a href="member/login/forgetpass.php">ลืมรหัสผ่าน?</a> <br>
<input type="submit" name="checklogin" class="btn btn-default" value="ลงชื่อเข้าใช้">
        </form>
       </div>
       <div class="col-xs-6 .col-sm-2" style="border-left:2px solid black; ">
         <br><br>
         <form class="" action="" method="post">
           <img src="image/facebook.png" style="width:150px; height:130px;">
           <a href="member/loginfacebook.html"><button type="button" name="flogin">login with facebook</button></a>
         </form>

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
