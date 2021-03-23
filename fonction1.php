<?php
$mabase = null;
try{
$user ="230223_lea";
$pass = "TDataSource1234";

$mabase=new PDO('mysql:host=mysql-leabernard.alwaysdata.net; dbname=leabernard_virus; charset=utf8','230223_lea','Pastelle6169');


}catch(Exception $e){
echo $e->getMessage();

}





?>