<?php
session_start();
$uid=$_SESSION['id1'];
$uname=$_SESSION['uname'];
// if(!isset($_POST['sub'])){
//     header("location:Order.php");
// }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jsPDF/dist"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: url();
        }
        .main{
            display: flex;
            justify-content: center;
        }
        .main2{
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }
        .main3{
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }
        .second2{
            height: 30px;
        }
        .sanlogo{
        height: 100px;width: 100px;
        border-radius: 50px;
        box-shadow: 0px 0px 3px 3px #f28482;
    }
    </style>
</head>
<body>
  <div class="download">
<div class="main row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="first text-primary">Thank You!!!</span>
          <span class="second badge bg-success rounded-pill">Your Order Placed successfully</span>
        </h4>
        <ul class="list-group mb-3">
        <?php
    include ("authen.php");
    $query="SELECT cart.product_id,cart.Quantity,producttable.image,producttable.Name,producttable.Price FROM `cart` inner join producttable on cart.product_id=producttable.id where user_id=$uid ";
    $conn=mysqli_query($data,$query);
    $total=0;
    for($i=0;$i<$conn->num_rows;$i++){
            $imag=mysqli_fetch_array($conn); 
            $qa=$imag['Quantity'];
            $sa=$imag['Price'];
            $total=$total+($qa*$sa);
    ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo $imag['Name']; ?></h6>
              <small class="text-body-secondary">x <?php echo $imag['Quantity']; ?></small>
            </div>
            <span class="text-body-secondary"><?php echo $imag['Price']; ?></span>
          </li>
          <?php
    }
    ?>
     <li class="list-group-item d-flex justify-content-between">
            <span>Total (₹)</span>
            <strong>₹<?php echo $total; ?></strong>
          </li>
        </ul>
        
        <div class="main3">
        <div class="card" style="width: 18rem;">
        <?php
    include("authen.php");
    $id=$_SESSION['order'];
    $sqlQuery="Select * from `orderstable` where orderid=$id";
    $connc=mysqli_query($data,$sqlQuery);
    while($w=mysqli_fetch_assoc($connc)){
      ?>
    <div class="card-body">
    Order Id:<h5 class="card-title"><?php echo $id; ?></h5>
    Name:<h5 class="card-title"><?php echo $w['Name']; ?></h5>
    <!-- Country:<h5 class="card-text"><?php echo $w['country']; ?></h5> -->
  </div>
  <?php
}
?>
        </div>
        </di v>
        <div class="main2">
            <div>
        <span class="second2 badge bg-dark rounded-pill">Visit Again...(\_/)</span>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRadgu7ZE75Yhdhdu0DRCiJ_QO1QXMgIOZCw&usqp=CAU" class="sanlogo img-fluid"  alt="">
            </div>
        </div>
      </div>
      <div>
        <button onclick="down()">Download</button>
      </div>
</body>
</html>
<script>
    function down(){
    window.jsPDF =window.jspdf.jsPDF;
    let doc= new jsPDF();
    let elementHTML = document.body;
    doc.html(elementHTML, {
        callback: function(doc){
            doc.save('orders.pdf');
        },
        x:10,
        y:15,
        width:170,
        windowWidth:450
    });
}
</script>