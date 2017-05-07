<?php
include "\../config/config.php";

  if(isset($_POST['changename'])){
    $sql = "UPDATE table_member SET firstname='".$_POST['firstname']."',lastname='".$_POST['lastname']."' WHERE username='".$_SESSION['username']."'";
      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
  }

    if($_POST['oldpass']==$_SESSION['password']){
    $sql = "UPDATE table_member SET password='".$_POST['newpass']."' WHERE username='".$_SESSION['username']."'";
      if ($connect->query($sql) === TRUE) {
            header('Location:..\member.php?action=profiles');
            $_SESSION['password']=$_POST['newpass'];
      }
    }


 ?>
