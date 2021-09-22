<?php
require_once '../MyCon.php';
$ob=new MyCon();
$id=$_GET['id'];
$sql = "select imag from cab_detail where id='$id'";
//echo $sql;
$result = $ob->runQuery($sql);
if ($row = mysqli_fetch_array($result)) { 
   
    echo $row[0];
}