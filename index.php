<?php
require_once 'config/config.php';
include_once 'template/header.php';
$sample_rate = 1;
if(mt_rand(1,$sample_rate)==1) {
    $connect->query("UPDATE posts SET views = views + $sample_rate");
    // execute query, etc
}
include_once 'template/main.php';
include_once 'template/footer.php';




 ?>
