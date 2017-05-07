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
<?php echo '<script type="text/javascript">var oldpass="'.$_SESSION['password'].'";</script>' ?>
<script type="text/javascript">
  function checkpass(){
    if(document.getElementById("newpass").value
    !=document.getElementById("cnewpass").value){
      document.getElementById("changepassword").disabled = true;
      document.getElementById("status").innerHTML="not same";
    }
    else {
      document.getElementById("changepassword").disabled = false;
      document.getElementById("status").innerHTML="";
    }
  }
  function checkold(){
    document.getElementById("status").innerHTML=oldpass;
    if(document.getElementById("oldpass").value==oldpass){
      document.getElementById("changepassword").disabled = false;
    }
    else{
      document.getElementById("changepassword").disabled = true;
      alert('Old password incorrect');
    }

  }
  //oldpass
</script>
<div class="container">

<div>

<b>ชื่อจริง</b> <?php echo $_SESSION['firstname']; ?> <b>นามสกุล </b><?php echo $_SESSION['lastname']; ?>
<input class="edit check" id="editname" type="checkbox">
<label class="edit text" for="editname">edit</label>
<form method="post" class="edit name" action="member/updateprofile.php">
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
<b>USERNAME</b> <?php echo $_SESSION['username']; ?><br>
<b>PASSWORD </b><input type="password" class="tranparent" name="" value="<?php echo $_SESSION['password']; ?>" disabled>
<input class="edit check" id="editpass" type="checkbox">
<label class="edit text" for="editpass">edit</label>
<form method="post" class="edit name" action="member/updateprofile.php">
Change Password <br><br>
<label>รหัสผ่านเก่า : </label><br>
  <input type="text"  onblur="checkold()" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" required><br>
 <label>รหัสผ่านใหม่ : </label><br>
 <input type="text" name="newpass" id="newpass" class="form-control" placeholder="New Password" required><br>
<label> ยืนยันรหัสผ่าน : </label><span id='status'></span><br>
<input type="text" name="cnewpass" id="cnewpass" class="form-control" placeholder="Confirm Password" required onchange="checkpass()"><br>
<input type="submit" name="changepassword" id="changepassword" class="form-control" value="เปลี่ยนรหัสผ่าน">
</form>
</div>
<div>
<b>ที่อยู่จัดส่ง :</b>
<?php if(isset($_SESSION['address'])){echo $_SESSION['address'];} ?>
<input class="edit check" id="editadd" type="checkbox">
<label class="edit text" for="editadd">edit</label>
<form method="post" class="edit name" action="member/updateprofile.php">
 <textarea class="form-control" name="address"> </textarea>
<input type="submit" name="changeaddress" id="changeaddress" class="form-control" value="เปลี่ยนรหัสผ่าน">
</form>
</div>
</div>
