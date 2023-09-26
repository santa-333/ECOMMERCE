<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .main{
            display: flex;
            justify-content: center;
            padding: 100px 0px 0px 100px;
        }
        .form:hover{
            box-shadow: 0px 0px 10px 10px #f9c784;
        }
        .form{
            background-color: #AFD3E2;
            width: 30%;height: 290px;
            border-radius: 40px;
       }
        h3{
            text-align: center;
        }
        .userm{
            position: relative;
            margin-left: 65px;
            margin-top: 5px;
        }
        .userm i{
            position: absolute;
            top: 2px;
            left: 3px;
        }
        .name{
            padding: 0px 0px 0px 30px;
        }
        .mobilem{
            position: relative;
            margin-left: 65px;
            margin-top: 5px;
        }
        .mobilem i{
            position: absolute;
            top: 2px;
            left: 3px;
        }
        .mobile{
            padding: 0px 0px 0px 30px;
        }
        .umail{
            position: relative;
            margin-left: 65px;
            margin-top: 5px;
        }
        .umail i{
            position: absolute;
            top: 2px;
            left: 3px;
        }
        .mail{
            padding: 0px 0px 0px 30px;
        }
        .userp{
            position: relative;
            margin-left: 65px;
            margin-top: 5px;
        }
        .userp i{
            position: absolute;
            top: 2px;
            left: 3px;
        }
        .pass{
            padding: 0px 0px 0px 30px;
        }
        .userimg{
            margin-top: 10px;
            margin-left: 75px;
        }
        .submit{
            margin-top: 10px;
            margin-left: 125px;
            background-color: #f9c784;
        }
        .a1{
            display: flex;
            padding: 0px 0px 0px 0px;
        }
        .a1 a{
            margin-top: 10px;
            margin-left: 3px;
            color: brown;
        }
        .msg{
            margin-top: 20px;
            width: 50%;
        }
        </style>
</head>
<body>
    <div class="main">
    <div class="form">
    <form action="userregister.php" method="post" enctype="multipart/form-data">
    <div class="login">
    <h3>SIGNUP</h3>
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
    <i class="fa-solid fa-lock"></i>
    <div>
        <input type="password" name="pass" class="pass" placeholder="password" required>
    </div>
    </div>
    <div class="userimg">
        <input type="file" name="file" required>
    </div>
    <div class="a1">
        <a href="userlogin.php">Already a user</a>
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
    $tab='usertable';
    $out='';
    // mysqli_num_rows(mysqli_query($data,'select * from sample'));
    $mail1=0;
    $sqmail=mysqli_query($data,"Select Email FROM `usertable` WHERE Email = '$mail'");
    if(mysqli_num_rows($sqmail)>0){
    $out="Mail id already exist Pls login";
    }
    else{
    $outMessageorError = '';
    $targetDir = "uimages/";
    if(!empty($_FILES["file"]["name"])){
      echo "gudFVGGYDFFVD";
    // $fileName = basename($_FILES["file"]["name"]);
    $fileName = rand(1000,10000)."-".$_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    if(in_array($fileType, array('jpg','png','jpeg','gif','webp'))){
        echo "gud";
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
    $insert = mysqli_query($data,"INSERT INTO `usertable`(Name,Mobile,Email,image,Password) VALUES ('".$name."','".$mobile."','".$mail."','".$fileName."','".$pass."')");
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
    header("location:userlogin.php");
    }
    echo "<div class='msg alert alert-danger' role='alert'>
    Mail Id Already exist!  Pls login...
    </div>";
    }
    ?>