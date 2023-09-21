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
            padding: 100px 0px 50px 0px;
        }
        .form{
            background-color: #AFD3E2;
            width: 25%;height: 300px;
            border-radius: 40px;
        }
        .form:hover{
            box-shadow: 0px 0px 10px 10px #495057;
        }
        h3{
            text-align: center;
        }
        .im img{
            margin-left: 110px;
        }
        .userm{
            position: relative;
            margin-top: 10px;
            margin-left: 75px;
        }
        .userm i{
            position: absolute;
            top: 4px;
            left: 5px;
        }
        .userm input{
            height: 20px;
            border-radius: 10px;
        }
        .userp input{
            height: 20px;
            border-radius: 10px;
        }
        .email{
            padding: 0px 0px 0px 30px;
        }
        .userp{
            position: relative;
            margin-left: 75px;
        }
        .userp i{
            position: absolute;
            top: 4px;
            left: 5px;
        }
        .pass1{
            padding: 0px 0px 0px 30px;
        }
        .submit{
            margin-top: 10px;
            margin-left: 135px;
            background-color: #06d6a0;
        }
        </style>
</head>
<body>
    <div class="main">
    <div class="form">
<form action="adminlogin.php" method="post">
<div class="login">
    <h3>LOGIN</h3>
    <div class="im">
    <img src="https://cdn-icons-png.flaticon.com/512/295/295128.png" height="100px" width="100px">
    </div>
        <div class="userm">
        <i class="fa-solid fa-envelope"></i>
        <div><input type="text" name="email" class="email" placeholder="Enter admin email" required></div>
        </div><br>
        <div class="userp">
        <i class="fa-solid fa-lock fa-bounce"></i>
        <div>
        <input type="password" name="pass1" class="pass1" placeholder="Enter Password" required>
        </div></div><br>
        <!-- <button type="submit" onclick="sana1()" class="submit">submit</button> -->
        <input type="submit" name="sub"  value="submit" class="submit">
        </div>
    </form>
    </div>
    </div>
</body>
</html>
<?php
include ("authen.php");
if(isset($_POST['sub'])){
        $mail=$_POST['email'];
        $pass1=$_POST['pass1'];
        $out='';
        $sqname=mysqli_query($data,"select Email FROM `admintable` where Email = '$mail'");
        $sqname1=mysqli_fetch_array($sqname)[0];
        if($sqname1!=$mail){
        echo"create a account";
        header("location:adminregister.php");  
        }
// echo"priyaaa";
    if(mysqli_num_rows($sqname)>0){
        $sqpass=mysqli_query($data,"Select Password FROM `admintable` WHERE Email = '$sqname1'");
        $sqpass1=mysqli_fetch_array($sqpass)[0];
        if($sqpass1===$pass1){
            session_start();
            $_SESSION['Name']=mysqli_fetch_array(mysqli_query($data,"SELECT Name from `admintable` where Email ='$mail' and Password='$pass1'"))['Name'];
            $_SESSION['image']="<img src='"."adminimg/".mysqli_fetch_array(mysqli_query($data,"SELECT image from `admintable` where Email ='$mail' and Password='$pass1'"))['image']."'>";
            header("location:adminbtns.php");
        }
        else{
            echo "Enter the crct password";
        }
    }
    }
?>

