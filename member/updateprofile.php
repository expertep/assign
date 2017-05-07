<?php
include "\../config/config.php";

  if(isset($_POST['changename'])){
    $sql = "UPDATE table_member SET firstname='".$_POST['firstname']."',lastname='".$_POST['lastname']."' WHERE username='".$_SESSION['username']."'";
      if ($connect->query($sql) === TRUE) {
        header('Location:..\member.php?action=profiles');
        $_SESSION['firstname']=$_POST['firstname'];
        $_SESSION['lastname']=$_POST['lastname'];
      } else {
          echo "Error updating record: " . $conn->error;
      }
  }

    else if($_POST['oldpass']==$_SESSION['password']){
    $sql = "UPDATE table_member SET password='".$_POST['newpass']."' WHERE username='".$_SESSION['username']."'";
      if ($connect->query($sql) === TRUE) {
            header('Location:..\member.php?action=profiles');
            $_SESSION['password']=$_POST['newpass'];
      }
    }
    else if(isset($_POST['changeaddress'])){
      $sql = "UPDATE table_member SET address='".$_POST['address']."' WHERE username='".$_SESSION['username']."'";
        if ($connect->query($sql) === TRUE) {
          header('Location:..\member.php?action=profiles');
          $_SESSION['address']=$_POST['address'];
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

 ?>
