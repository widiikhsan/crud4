<?php

$host="localhost";
$user="root";
$password="";
$db="crud";

$kon = mysql_connect($host,$user,$password,$db);
if (!$kon){
    die("Koneksi Gagal:".mysql_connect_error());

}
?>
