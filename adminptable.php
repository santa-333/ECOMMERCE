<?php
include ("authen.php");
for($id=1;$id<=10;$id++){
$query="SELECT  `image` FROM `producttable` where id=$id";
$conn=mysqli_query($data,$query);
$imag=mysqli_fetch_assoc($conn);
echo $imag['image'] ;
}

?>