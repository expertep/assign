<?php
require_once 'config/config.php';
include_once 'template/header.php';
$sample_rate = 1;
if(mt_rand(1,$sample_rate)==1) {
    $result=$connect->query("SELECT date FROM posts WHERE DATE_FORMAT(date,'%Y-%m') = '".date("Y-m")."'");
    if ($result->num_rows > 0) {
      $connect->query("UPDATE posts SET views = views + 1 WHERE DATE_FORMAT(date,'%Y-%m') = '".date("Y-m")."'");
    }
    else{
      $connect->query("INSERT INTO posts (date) VALUES ('".date("Y-m-d")."')");
    }
    // นับวิว แต่ละเดือน
}
include_once 'template/main.php';
include_once 'template/footer.php';




 ?>
