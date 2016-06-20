<?php 
ob_start();
session_start();
include_once('ketnoi.php');
if($_SESSION['quyen']==1 || $_SESSION['quyen']==2){
$id=$_GET['id'];
$sql="Delete from profile where ID=$id";
$query=mysql_query($sql);
header('location:index.php');
}
else{header('location:index.php');}
?>