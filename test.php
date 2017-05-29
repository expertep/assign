<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
    .container {

      width:1280px;
    }
    div {
 width:50px;
 padding:5px;
  border:1px solid black;

}
    </style>
  </head>
  <body>

  <?php
session_start();

if ($_POST){

 if (isset($_POST['test'])){
   echo "asdasd";
 }
 else {
   echo "maidai";
 }
}

   ?>
   <form method="POST">
   <input type="text" name="test" value="<?php echo $use; ?>">
   <button>asdasd</button>
 </form>

  </body>
</html>
