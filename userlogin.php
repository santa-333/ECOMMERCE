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
            background-color: #AFD3E2;
            width: 25%;height: 300px;
            border-radius: 40px;
        }
        .form:hover{
            box-shadow:0px 0px 10px 10px #f9c784;
        }
        h3{
            text-align: center;
        }
        .img{
            padding: 0px 0px 0px 110px;
        }
        .userm{
            position: relative;
            margin-left: 75px;
        }
        .userm i{
            position: absolute;
            top: 4px;
            left: 6px;
        }
        .email{
            padding: 0px 0px 0px 30px;
            border-radius: 40px;
            height: 20px;
        }
        .userp{
            position: relative;
            margin-left: 75px;
        }
        .userp i{
            position: absolute;
            top: 4px;
            left: 6px;
        }
        .pass1{
            padding: 0px 0px 0px 30px;
            border-radius: 40px;
            height: 20px;
        }
        .sub{
            padding: 0px 0px 0px 130px;   
        }
        .submit{
            background-color: #f9c784;
        }
        @media(max-width:1200px){
            .form{
            background-color: #AFD3E2;
            width: 50%;height: 300px;
            border-radius: 40px;
        }
        }
        </style>
</head>
<body>
    <div class="main">
    <div class="form">
<form action="userlogin.php" method="post">
<div class="login">
    <h3>LOGIN</h3>
    <div class="img">
    <img src="https://fra-online.pln.co.id/asset/img/avatar1_big.png" class="img-fluid" alt="..." height="100px" width="100px">
    </div>
        <div class="userm">
        <i class="fa-solid fa-envelope"></i>
        <div class="inp">
            <input type="text" name="mail" class="email" placeholder="Enter Your Email" required>
        </div>
        </div><br>
        <div class="userp">
        <i class="fa-solid fa-lock fa-shake"></i>
        <div class="inp2">
        <input type="password" name="pass" class="pass1" placeholder="Enter Your Password" required>
        </div>
        </div><br>
        <!-- <button type="submit" onclick="sana1()" class="submit">submit</button> -->
        <div class="sub">
        <input type="submit" value="submit" class="submit" name="submit">
        </div>
        </div>
    </form>
    </div>
    </div>
</body>
</html>
<?php
include ("authen.php");
if(isset($_POST['submit'])){
    $mail=$_POST['mail'];
    $pass1=$_POST['pass'];
    $tab='usertable';
    $out='';

    $sqname=mysqli_query($data,"select Email FROM `$tab` where Email = '$mail'");
    $sqname1=mysqli_fetch_array($sqname)[0];
    if($sqname1!=$mail){
    echo"create a account";
    header("location:userregister.php");  
    }
// echo"priyaaa";
    if(mysqli_num_rows($sqname)>0){
        $sqpass=mysqli_query($data,"Select Password FROM `$tab` WHERE Email = '$sqname1'");
        $sqpass1=mysqli_fetch_array($sqpass)[0];


        if($sqpass1===$pass1){
            session_start();
            $_SESSION['id1']=mysqli_fetch_array(mysqli_query($data,"SELECT userid from `usertable` where Email ='$mail' and Password='$pass1'"))['userid'];
            $_SESSION['uname']=mysqli_fetch_array(mysqli_query($data,"SELECT Name from `usertable` where Email ='$mail' and Password='$pass1'"))['Name'];
            $_SESSION['uimage']="<img src='"."images/".mysqli_fetch_array(mysqli_query($data,"SELECT image from `usertable` where Email ='$mail' and Password='$pass1'"))['image']."'>";
            header("location:homepage.php");
        }
        else{
            echo "Enter the crct password";
        }
    }
    }
    ?>

