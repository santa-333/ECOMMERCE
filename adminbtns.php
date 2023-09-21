<?php
session_start();
if(!isset($_SESSION['Name'])){
    header('location:adminlogin.php');
}

if(isset($_POST['usubmit'])){
    session_destroy();
    header('location:adminlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body{
            background: linear-gradient(to right,#F8F0E5,#EADBC8,#DAC0A3);
            font-family: fantasy;
        }
        h1{
            text-align: center;
        }
        .head{
        display: flex;
        justify-content: center;
    }
    .header{
        display: flex;
        /* justify-content: space-between; */
        width:75%;
        margin-top: 15px;
        background-color: black;
        color: #f28482;
        border-radius: 40px;
        padding: 5px 25px 10px 25px;
        align-items: center;
    }
    .logo img{
        width: 100px;height: 100px;
        border-radius: 50px;
        margin-left: 400px;
    }
    .inpu .inp{
        color: #f28482;
        background-color: transparent;
        box-shadow: 0px 0px 5px 5px #f28482;
        padding: 0px 5px 0px 5px;
        margin-left: 20px;
    }
    
        img{
            width: 70px;
            height: 70px;
            border-radius: 50px;
        }
        /* .but{
            display: flex;
            justify-content: center;
            align-items: center;
        } */
        .b1{
            background-color: #f28482;
            color: black;
            box-shadow: 0px 0px 10px 10px black;
            width: 50%;
            height: 150px;
            padding: 50px 0px 50px 0px;
        }
        .b2{
            background-color: #f28482;
            color: black;
            box-shadow: 0px 0px 10px 10px black;
            width: 50%;
            height: 150px;
            padding: 50px 0px 50px 0px;
        }
        .b3{
            background-color: #f28482;
            color: black;
            box-shadow: 0px 0px 10px 10px black;
            width: 50%;
            height: 150px;
            padding: 50px 0px 50px 0px;
        }
        .b4{
            background-color: #f28482;
            color: black;
            box-shadow: 0px 0px 10px 10px black;
            width: 50%;
            height: 150px;
            padding: 50px 0px 50px 0px;
        }
        .container{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            grid-template-rows: repeat(2,1fr);
            gap: 20px;
            margin-top: 20px;
            padding: 0px 100px 0px 300px;
            
        }
        .b:hover{
            background-color: black;
            color: #f28482;
            box-shadow: 0px 0px 10px 10px #f28482;
        }
    </style>
</head>
<body>
    <h1>ADMIN PANEL</h1>
    <div class="head">
    <div class="header">
                <div class="dp">
                <h1>WElCOME <?php echo $_SESSION['Name'] ?></h1>
                </div>
                <div class="logo">
                <?php echo $_SESSION['image']; ?>
                </div>
                <div class="inpu">
                <form method="post">
                    <input type="submit" value="Logout" name="usubmit" class="inp">
                </form>
                </div>
                </div>
    </div>
    <div class="container">
    <div class="but"><a  class="b1  b  btn btn-dark" href=""   type="submit" value="Orders" name="order">Orders</a></div>
    <div class="but"><a  class="b2  b  btn btn-dark" href="productTable.php"  type="submit" value="products" name="product">Products</a></div>
    <div class="but"><a  class="b3  b  btn btn-dark"href="adminutable.php"  type="submit" value="Customers" name="customer">Customers</a></div>
    <div class="but"><a  class="b4 b   btn btn-dark"href="adminregister.php"  type="submit" value="Add admin" name="admin">Add admin</a></div>
    </div>
</body>
</html>

