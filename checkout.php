<?php
session_start();
$uid=$_SESSION['id1'];
echo $uid;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <?php
    include ("authen.php");
    $query="SELECT producttable.image,producttable.Name,producttable.Price FROM `cart` inner join producttable on cart.product_id=producttable.id where user_id=$uid ";
    $conn=mysqli_query($data,$query);
    for($i=0;$i<$conn->num_rows;$i++){
            $imag=mysqli_fetch_array($conn); 
    ?>
    <div class="cont card" style="width: 18rem;">
        <img src="images/<?php echo $imag['image']; ?>" class="im card-img-top" alt="..." height="100px" width="100px">
        <div class="card-body">
            <h5 class="card-title"><?php echo $imag['Name']; ?></h5>
            <p class="card-text">₹<?php echo $imag['Price']; ?></p>
            <form action="" method="post">
            <input class="but btn btn-primary" type="submit" name="sub" onclick="setTimeout(myFunction, 100);" value="Add to Cart">
            <!-- <input type="hidden"  name="some" value="<?php echo $imag['id']; ?>"> -->
            </form>
        </div>
        </div>
    <?php
    }
?>
 </div>
</body>
</html>
