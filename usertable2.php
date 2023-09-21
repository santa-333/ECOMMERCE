<?php
include ('authen.php');
$id=$_POST['userid'];
$name=$_POST['name'];
$pass=$_POST['pass'];
$mobile=$_POST['Mobile'];
$mail=$_POST['mail'];
$tab='usertable';
// mysqli_num_rows(mysqli_query($data,'selects * from sample'));
    $mysq="UPDATE `usertable` SET Name='$name',`Mobile`=$mobile,`Email`='$mail',`Password`='$pass' 
    WHERE userid=$id ";
   $summa= mysqli_query($data,$mysq);
    header("location:adminutable.php");
?>