<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .form{
            background-color: #AFD3E2;
            width: 25%;height: 200px;
            margin-left: 450px;
        }
        h3{
            text-align: center;
        }
        .userm{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .userm i{
            position: absolute;
        }
        .name{
            padding-left: 20px;
        }
        .mobilem{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .mobilem i{
            position: absolute;
        }
        .mobile{
            padding-left: 20px;
        }
        .umail{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .umail i{
            position: absolute;
        }
        .mail{
            padding-left: 20px;
        }
        .userp{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .userp i{
            position: absolute;
        }
        .pass{
            padding-left: 20px;
        }
        .submit{
            margin-top: 10px;
            margin-left: 125px;
        }
        </style>
</head>
<body>
    <div class="form">
<form action="adminregister.php" method="get">
<div class="login">
    <h3>SIGNUP</h3>
    <div>
        <input type="text" name="name" class="name" placeholder="Product" required>
    </div>
    <div class="mobilem">
        <input type="number" name="Mobile" class="mobile" placeholder="Price" required>
    </div>
    <div>
        <input type="mail" name="mail" class="mail" placeholder="Quantity" required >
    </div>
    <div>
        <input type="submit" class="submit" name="sub" value="submit">
    </div>
        </div>
    </form>
    </div>  
</body>
</html>
<?php
include ("authen.php");
$name=$_GET['name'];
$mobile=$_GET['Mobile'];
$mail=$_GET['mail'];
$pass=$_GET['pass'];
$tab='usertable';
$out='';
// mysqli_num_rows(mysqli_query($data,'select * from sample'));
$mail1=0;
$sqmail=mysqli_query($data,"Select Email FROM `$tab` WHERE Email = '$mail'");
if(isset($_GET['sub'])){
    if(mysqli_num_rows($sqmail)>0){
    $mail1++;
    if($mail1>0){
    $out="Mail id already exist Pls login";
        }
    }
else{
    $outMessageorError = '';
$targetDir = "images/";
if(!empty($_FILES["file"]["name"])){
  echo "gudFVGGYDFFVD";
// $fileName = basename($_FILES["file"]["name"]);
$fileName = rand(1000,10000)."-".$_FILES["file"]["name"];
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(in_array($fileType, array('jpg','png','jpeg','gif'))){
    echo "gud";
if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
$insert = mysqli_query($data,"INSERT INTO `admintable`(Name,Phone,,Email,image,Password) VALUES ('".$name."','".$desc."','".$check."','".$price."', '".$fileName."','".$quant."')");
if($insert){
$outMessageorError = "The file ".$fileName. " has been uploaded successfully.";
}else{
$outMessageorError = "Imaghe cant be uplaoded";
}
}else{
$outMessageorError = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
}
}else{
$outMessageorError = 'Please select a file to upload.';
}
}

echo$outMessageorError;
}
}
?>