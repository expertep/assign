<style media="screen">
    .edit.check:not(:checked) ~form{
      display:none;
    }
    .edit.check:checked ~form{
    display:block;
    }
    .edit.check:checked +label{
      background-color: rgb(171, 32, 32);
    }
    .edit.check{
      display: none;
    }
    .edit.text{
      color:white;
      background-color: #333333;
      border-radius: 10%;
      padding: 3px 10px;
    }
    .tranparent{
      border: none;
      background-color: rgba(143, 171, 204, 0);
    }
</style>
<?php

?>
<div class="container">

<div>
<b>ชื่อจริง</b> <?php echo $_SESSION['username']; ?> <b>นามสกุล </b><?php echo $_SESSION['emailuser']; ?>
<input class="edit check" id="editname" type="checkbox">
<label class="edit text" for="editname">edit</label>
<form method="post" class="edit name" action="updateprofile.php">
<label>ชื่อจริง :</label><br>
<input type="text" name="firstname" class="form-control" placeholder="Firstname" required><br>
<label>นามสกุล : </label><br>
<input type="text" name="lastname" class="form-control" placeholder="Lastname" required><br>
<label>E-mail : </label><br>
<input type="email" name="email" class="form-control" placeholder="E-mail" required><br>
<input type="submit" name="changename" class="form-control" value="อัพเดท">
</form>
</div>

<div>
<b>PASSWORD </b><input type="password" class="tranparent" name="" value="<?php echo $_SESSION['password']; ?>" disabled>
<input class="edit check" id="editpass" type="checkbox">
<label class="edit text" for="editpass">edit</label>
<form method="post" class="edit name" action="member/updateprofile.php">
Change Password <br><br>
<label>รหัสผ่านเก่า : </label><br>
  <input type="text" name="oldpass" class="form-control" placeholder="Old Password" required><br>
 <label>รหัสผ่านใหม่ : </label><br>
 <input type="text" name="newpass" class="form-control" placeholder="New Password" required><br>
<label> ยืนยันรหัสผ่าน : </label><br>
<input type="text" name="cnewpass" class="form-control" placeholder="Confirm Password" required><br>
<input type="submit" name="changepassword" class="form-control" value="เปลี่ยนรหัสผ่าน">
</form>
</div>
<br><br>

ที่อยู่จัดส่ง <br><br>

<textarea class="form-control"> </textarea>
<input type="submit" name="changeaddress" class="form-control" value="อัพเดท">
</div>
