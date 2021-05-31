<?php
  include '../connect/connect.php';


$sql = "CREATE TABLE myBoard1 ( ";
$sql .= "boardID int(10) unsigned NOT NULL AUTO_INCREMENT, ";
$sql .= "memberID int(10) unsigned NOT NULL, ";
$sql .= "boardTitle varchar(50) NOT NULL, ";
$sql .= "boardContent longtext NOT NULL, ";
$sql .= "regTime int(10) unsigned NOT NULL, ";

//핵심 primary key
$sql .= "PRIMARY KEY(boardID)";
$sql .= ")CHARSET=utf8";

$result = $dbConnect -> query($sql);

if($result){
  echo 'Create Table Complete';
}else{
  echo 'Create Table False';
}
?>