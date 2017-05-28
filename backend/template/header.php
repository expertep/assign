<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ก่อสร้าง</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="..\javascript/css/bootstrap.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="..\/css/css1.css">
<link rel="stylesheet" type="text/css" href="..\/css/all.css">
  </head>
  <body >
    <!-- Latest compiled and minified JavaScript -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="..\/javascript/js/bootstrap.min.js" ></script>
    <script src="js/editjs.js" ></script>

<div class="nav-side-menu">
    <div class="brand"><img src="..\logo.png" class="brand logo"></div>
    <i class="fa fa-bars fa-2x toggle-btn l1" data-toggle="collapse" data-target="#menu-content"></i>
    <i class="fa fa-bars fa-2x toggle-btn l2" data-toggle="collapse" data-target="#menu-content"></i>
    <i class="fa fa-bars fa-2x toggle-btn l3" data-toggle="collapse" data-target="#menu-content"></i>

<?php
  $sql="SELECT COUNT(order_id) as noti FROM table_order WHERE pay='w'";
  $select = $connect->query($sql);
  $count=0;
  while ($row = $select->fetch_assoc()) {$count=$row['noti'];}

 ?>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
                <a href="member/.."><li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard<span class="sr-only">(current)</span></li></a>
                <a href="?action=product"><li>สินค้า<span class="sr-only">(current)</span></li></a>
                <a href="?action=insertproduct"><li>เพิ่มสินค้า<span class="sr-only">(current)</span></li></a>
                <a href="?action=insertdiscount"><li>เพิ่มโค๊ดส่วนลด<span class="sr-only">(current)</span></li></a>
                <a href="?action=orderhistory"><li>รายการสั่งซื้อ<span class="sr-only">(current)</span></li></a>
                <a href="?action=order"><li>รายการแจ้งสั่งซื้อ<span class="sr-only">(current)</span><?php if($count!=0){ ?><span class="badge"><?php echo $count; ?></span><?php } ?></li></a>
                <a href="?action=member"><li>จัดการสมาชิก<span class="sr-only">(current)</span></li></a>
                <a href="?action=logout"><li>HOMEPAGE<span class="sr-only">(current)</span></li></a>
        </ul>
     </div>
</div>
