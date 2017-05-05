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

$_SESSION['cart'][0]  = '1';
$_SESSION['cart'][1]  = '1';
$_SESSION['cart'][2]  = '2';
$_SESSION['cart'][3]  = '1';

echo array_search('2',$_SESSION['cart']);

   ?>



  </body>
</html>
