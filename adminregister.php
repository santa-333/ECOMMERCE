<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .main{
            display: flex;
            justify-content: center;
            padding: 50px 0px 50px 0px;
        }
        .form{
            background-color: #4ea8de;
            width: 25%;height: 400px;
            border-radius: 40px;
        }
        .form:hover{
            box-shadow: 0px 0px 10px 10px #f9c784;
        }
        h3{
            text-align: center;
        }
        .im img{
            margin-left: 110px;
        }
        .userm{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .userm i{
            position: absolute;
            top: 3px;
            left: 4px;
        }
        .name{
            padding: 0px 0px 0px 30px;
        }
        .mobilem{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .mobilem input{
            border-radius: 20px;
            height: 20px;
        }
        
        .mobilem i{
            position: absolute;
            top: 3px;
            left: 4px;
        }
        .mobile{
            padding: 0px 0px 0px 30px;
        }
        .umail{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .umail input{
            border-radius: 20px;
            height: 20px;
        }
        .userm input{
            border-radius: 20px;
            height: 20px;
        }
        .umail i{
            position: absolute;
            top: 3px;
            left: 4px;
        }
        .mail{
            padding: 0px 0px 0px 30px;
        }
        .userp{
            position: relative;
            margin-left: 75px;
            margin-top: 5px;
        }
        .userp input{
            border-radius: 20px;
            height: 20px;
        }
        .userp i{
            position: absolute;
            top: 3px;
            left: 4px;
        }
        .pass{
            padding: 0px 0px 0px 30px;
        }
        .adminimg{
            margin-top: 10px;
            margin-left: 75px;
        }
        .submit{
            margin-top: 10px;
            margin-left: 125px;
            background-color: #f9c784;
        }

        </style>
</head>
<body>
    <div class="main">
    <div class="form">
<form action="adminregister.php" method="post" enctype="multipart/form-data">
<div class="Signup">
    <h3>SIGNUP</h3>
    <div class="im">
    <img src="https://fra-online.pln.co.id/asset/img/avatar1_big.png" height="100px" width="100px">
    </div>
    <div class="userm">
    <i class="fa-solid fa-user"></i>
    <div>
        <input type="text" name="name" class="name" placeholder="Enter Name" required>
    </div>
    </div>
    <div class="mobilem">
    <i class="fa-solid fa-mobile"></i>
        <input type="number" name="Mobile" class="mobile" placeholder="Enter Mobile" required>
    </div>
    <div class="umail">
    <i class="fa-solid fa-envelope"></i>
    <div>
        <input type="mail" name="mail" class="mail" placeholder="mail" required >
    </div>
    </div>
    <div class="userp">
    <i class="fa-solid fa-lock fa-bounce"></i>
    <div>
        <input type="password" name="pass" class="pass" placeholder="password" required>
    </div>
    </div>
    <div class="adminimg">
            <input type="file" name="file" required>
    </div>
    <div>
        <input type="submit" class="submit" name="sub" value="submit">
    </div>
        </div>
    </form>
    </div>  
    </div>
</body>
</html>
<?php
include ("authen.php");
if(isset($_POST['sub'])){
    $name=$_POST['name'];
    $mobile=$_POST['Mobile'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $out='';
    // mysqli_num_rows(mysqli_query($data,'select * from sample'));
    $mail1=0;
    $sqmail=mysqli_query($data,"Select Email FROM `admintable` WHERE Email = '$mail'");
    if(mysqli_num_rows($sqmail)>0){
    $mail1++;
    if($mail1>0){
    $out="Mail id already exist Pls login";
        }
    }
else{
    $outMessageorError = '';
    $targetDir = "adminimg/";
    if(!empty($_FILES["file"]["name"])){
// $fileName = basename($_FILES["file"]["name"]);
    $fileName = rand(1000,10000)."-".$_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    if(in_array($fileType, array('jpg','png','jpeg','gif'))){
    echo "gud";
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
    $insert = mysqli_query($data,"INSERT INTO `admintable`(Name,Phone,Email,image,Password) VALUES ('".$name."','".$mobile."','".$mail."','".$fileName."','".$pass."')");
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
    echo $outMessageorError;
    header("location:adminlogin.php");
    }
    }
?>