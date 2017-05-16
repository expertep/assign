<?php
ob_start();
session_start();

$db_host = "198.46.144.201";
$db_username = "khaopodc_kong";
$db_password = "kong1234";
$db_name = "khaopodc_kong";

$connect = new mysqli($db_host,$db_username,$db_password,$db_name);
$connect->query('SET names utf8');
if($connect->connect_errno){
  echo $connect->connect_error;
}



/*foreach($_GET as $key => $value){
      $_GET[$key]=addslashes(strip_tags(trim($value)));
  }
  if($_GET['id'] !=''){
      $_GET['id']=(int) $_GET['id'];
  }
  extract($_GET);*/

 ?>
