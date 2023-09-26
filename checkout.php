<?php
session_start();
$uid=$_SESSION['id1'];
// if(!isset($_POST['sub3'])){
//     header("location:homepage.php");
// }
// echo $uid;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    .container{
        margin-top: 20px;
        display: grid;
        padding: 0px 100px 0px 100px;
        gap: 45px;
        grid-template-columns: repeat(3,1fr);
    }
    .header h1{
        text-align: center;
    }
    .im{
        height: 250px;width: 287px;
    }
    </style>
<body>
    <div class="header">
        <h1>CART</h1>
    </div>
<div class="container">
    <?php
    include ("authen.php");
    $query="SELECT cart.product_id,cart.Quantity,producttable.image,producttable.Name,producttable.Price FROM `cart` inner join producttable on cart.product_id=producttable.id where user_id=$uid ";
    $conn=mysqli_query($data,$query);
    for($i=0;$i<$conn->num_rows;$i++){
            $imag=mysqli_fetch_array($conn); 
            $qa=$imag['Quantity'];
            $sa=$imag['Price'];
            $total=$qa*$sa;
    ?>
    <div class="cont card" style="width: 18rem;">
        <img src="images/<?php echo $imag['image']; ?>" class="im card-img-top" alt="..." height="100px" width="100px">
        <div class="card-body">
            <h5 class="card-title"><?php echo $imag['Name']; ?></h5>
            <p class="card-text">₹<?php echo $imag['Price']; ?></p>
            <p class="card-text">Quantity:<?php echo $imag['Quantity']; ?></p>
            <form action="" method="post">
            <input type="hidden"  name="some" value="<?php echo $imag['product_id']; ?>">
            <input type="submit"  name="remove" class="btn btn-danger" value="Remove">
            </form>
            <p class="card-text">Total:<?php echo $total; ?></p>
            <!-- <form action="" method="post">
            <input class="but btn btn-primary" type="submit" name="sub" onclick="setTimeout(myFunction, 100);" value="Add to Cart"> -->
        </div>
        </div>
    <?php
    include("authen.php");
    if(isset($_POST['remove'])){
        $pid=$_POST['some'];
        $deleteQuery="DELETE from `cart` where  product_id='$pid' and user_id='$uid' ";
        $deleteconn=mysqli_query($data,$deleteQuery);
        if ($deleteconn == TRUE) {
            echo "Record deleted successfully.";
            header('Location: checkout.php');
        }
        else{
            echo "no";
        }
    }
}
?>
 </div>
 <div>
    <form action="" method="post">
    <input type="submit" value="Click for Place the Order" name="subb">
    </form>
    <form action="" method="post">
    <input type="submit" value="Home Page" name="sub5">
    </form>
 </div>
</body>
</html>
<?php
if(isset($_POST['subb'])){
    header("location:order.php");
}
if(isset($_POST['sub5'])){
    header("location:homepage.php");
}

?>