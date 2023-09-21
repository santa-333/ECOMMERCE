<?php
session_start();
if(!isset($_SESSION['uname'])){
    header('location:userlogin.php');
}

if(isset($_POST['usubmit'])){
    session_destroy();
    header('location:userlogin.php');
}
if(isset($_POST['sub2'])){
    header("location:checkout.php");
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
        background-color: #e5e5e5;
    } 
    .head{
        display: flex;
        justify-content: center;
    }
    .header{
        display: flex;
        justify-content: space-between;
        width:75%;
        margin-top: 15px;
        background-color: black;
        color: #f28482;
        border-radius: 40px;
        padding: 0px 25px 0px 25px;
        align-items: center;
    }
    .logo{
        display: flex;
    }
    .logo img{
        width: 100px;height: 100px;
        border-radius: 50px;
    }
    .inpu{
        padding: 35px 0px 0px 20px;
    }
    .inpu .inp{
        color: #f28482;
        background-color: transparent;
        box-shadow: 0px 0px 3px 3px #f28482;
        padding: 0px 5px 0px 5px;
    }
    .im{
        height: 250px;width: 287px;
    }
    .container{
        margin-top: 20px;
        display: grid;
        padding: 0px 100px 0px 100px;
        gap: 45px;
        grid-template-columns: repeat(3,1fr);
    }
    .cont{
        background-color: black;
        color: #f28482;
    }
    .cont .but{
        background-color: #f28482;
        color: black;
    }
    .cont .but:hover{
        background-color: black;
        color: #f28482;
        box-shadow: 0px 0px 3px 3px #f28482;
    }
    .inc{
        width: 100px;
        background-color: transparent;
        color: #f28482;
    }
    @media(max-width:1200px){
        .container{
        display: grid;
        padding: 10px 10px 0px 100px;
        gap: 35px;
        grid-template-columns: repeat(2,1fr);
    }
    .header{
        display: flex;
        justify-content: space-between;
        width:75%;
    }}
    @media(max-width:1000px){
        .container{
        display: grid;
        padding: 10px 20px 0px 20px;
        gap: 35px;
        grid-template-columns: repeat(2,1fr);
    }
    .header{
        display: flex;
        justify-content: space-between;
        width:75%;
    }}
    /* @media(max-width:800px){
        .container{
        display: grid;
        padding: 10px 50px 0px 50px;
        gap: 35px;
        grid-template-columns: repeat(2,1fr);
    }
    .header{
        display: flex;
        justify-content: space-between;
        width:75%;
    }} */
    @media(max-width:770px){
        .container{
        display: grid;
        padding: 0px 200px 0px 0px;
        gap: 35px;
        grid-template-columns: repeat(2,1fr);
    }
    .header{
        display: flex;
        justify-content: space-between;
        width:75%;
    }}
    @media(max-width:650px){
        .head{
        display: flex;
        justify-content: center;
        padding: 0px 0px 0px 40px;
    }
    .header{
        display: flex;
        justify-content: space-between;
        width:100%;
    }
    .inpu{
        padding: 10px 0px 0px 10px;
    }
    .logo img{
        width: 50px;height: 50px;
        border-radius: 50px;
    }
    }
    @media(max-width:550px){
        .head{
        display: flex;
        justify-content: center;
        padding: 0px 40px 0px 150px;
        margin-left: auto;
    }
    .header{
        display: flex;
        justify-content: space-between;
        width:100%;
    }
    .logo img{
        width:30px;height: 30px;
        border-radius: 50px;
    }
    }
    </style>
</head>
<body>
    <div class="head">
    <div class="header">
                <div class="dp">
                <h1>WElCOME <?php echo $_SESSION['uname'] ?></h1>
                </div>
                <div class="logo">
                <?php echo $_SESSION['uimage']; ?>
                <div class="inpu">
                <form method="post">
                    <input type="submit" value="logout" name="usubmit" class="inp">
                    <div><input type="submit" name="sub2" value=""></div>
                </form>
                
                </div>
                </div>
                </div>
    </div>
    </div>
    <div class="container">
    <?php
    include ("authen.php");
    $query="SELECT * FROM `producttable`";
    $conn=mysqli_query($data,$query);
    for($i=0;$i<$conn->num_rows;$i++){
            $imag=mysqli_fetch_array($conn); 
    ?>
    <div class="cont card" style="width: 18rem;">
        <img src="images/<?php echo $imag['image']; ?>" class="im card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $imag['Name']; ?></h5>
            <p class="card-text">₹<?php echo $imag['Price']; ?></p>
            <form action="" method="post">
            <input type="number" step="1" class="inc" name="input">
            <input class="but btn btn-primary" type="submit" name="sub" onclick="setTimeout(myFunction, 100);" value="Add to Cart">
            <input type="hidden"  name="some" value="<?php echo $imag['id']; ?>">
            </form>
        </div>
        </div>
    <?php
    }
?>
 </div>
</body>
</html>
<?php
include("authen.php");
if(isset($_POST['sub'])){ 
    if($_POST['input']>0){
//     echo "<script>
// function myFunction() {
//   alert('Added to the cart');
// }
// </script>";
    $quant=$_POST['input'];
    $userid=$_SESSION['id1'];
    echo $userid;
    $quant=$_POST['input'];
    $cart=$userid+33;
    // session_start();
    $productid=$_POST['some'];
    $_SESSION['id']=mysqli_fetch_array(mysqli_query($data,"SELECT id from `producttable` where id ='$productid'"))['id'];
    echo $_SESSION['id'];
    $sq="select * from `cart` where user_id='$userid'";
    $psq="select * from `cart` where product_id='$productid'";
    $sq2=mysqli_query($data,$sq);
    $psq2=mysqli_query($data,$psq);
    if((mysqli_num_rows($sq2)==0)and(mysqli_num_rows($psq2)==0)){
    $somw="INSERT INTO `Cart` (Cartid,user_id,product_id,Quantity) VALUES ('$cart','$userid','$productid','$quant')";
    $mysq=mysqli_query($data,$somw);
    }
    elseif((mysqli_num_rows($sq2)==0)or(mysqli_num_rows($psq2)==0)){
        $som2="INSERT INTO `Cart` (Cartid,user_id,product_id,Quantity) VALUES ('$cart','$userid','$productid','$quant')";
        $mysq4=mysqli_query($data,$som2);
    }
    else{
        $mysq2="Update `Cart` set Quantity=$quant where product_id='$productid'";
        $mysq3=mysqli_query($data,$mysq2);
    }
    }
    if($mysq3){
        echo "success";
    }
}

?>
