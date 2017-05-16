<?php
ob_start();
session_start();

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "assignment";

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
