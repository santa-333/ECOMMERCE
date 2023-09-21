<?php
$host='localhost';
$user='root';
$password='root';
$database='monday';
$data=mysqli_connect($host,$user,$password,$database);
if(!($data)){
    echo "hello";
}
?>