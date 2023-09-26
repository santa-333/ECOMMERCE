<?php
session_start();
$uid=$_SESSION['id1'];
$uname=$_SESSION['uname'];
// if(!isset($_POST['sub'])){
//     header("location:Order.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
></script>
<script src="js/jsPDF/dist"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>
<body>
    <section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;"><?php echo $uname; ?></span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
            </div>
            <div class="card shadow-0 border mb-4">
                <?php
            include ("authen.php");
    $query="SELECT cart.product_id,cart.Quantity,producttable.image,producttable.Name,producttable.Price FROM `cart` inner join producttable on cart.product_id=producttable.id where user_id=$uid ";
    $conn=mysqli_query($data,$query);
    $total=0;
    for($i=0;$i<$conn->num_rows;$i++){
            $imag=mysqli_fetch_array($conn); 
            $qa=$imag['Quantity'];
            $sa=$imag['Price'];
            $total1=$qa*$sa;
            $total=$total+($qa*$sa);
    ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                  <img src="images/<?php echo $imag['image']; ?>" class="im card-img-top" alt="..." height="100px" width="100px">
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0"><?php echo $imag['Name']; ?></p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Qty: <?php echo $imag['Quantity']; ?></p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Rs.<?php echo $imag['Price']; ?>/Item</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Total Rs.<?php echo $total1 ?></p>
                  </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                  <div class="col-md-2">
                    <p class="text-muted mb-0 small">Track Order</p>
                  </div>
                  <div class="col-md-10">
                    <div class="progress" style="height: 6px; border-radius: 16px;">
                      <div class="progress-bar" role="progressbar"
                        style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-around mb-1">
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
    }
    ?>
            </div>
            <div >
            <?php
            include("authen.php");
    $id=$_SESSION['order'];
    $sqlQuery="Select * from `orderstable` where orderid=$id";
    $connc=mysqli_query($data,$sqlQuery);
    while($w=mysqli_fetch_assoc($connc)){
      ?>

            <div class="d-flex justify-content-between pt-2">
           
              <p class="fw-bold mb-0">Order Details</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> Rs.<?php echo $total ?>.00</p>
            </div>

            <div class="d-flex justify-content-between pt-2">
              <p class="text-muted mb-0">Invoice Number :<?php echo $id ?> </p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="text-muted mb-0">Invoice Date : <?php echo $w['order_time'] ?></p>
            </div>

            <div class="d-flex justify-content-between mb-5">
              <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges : </span> Free</p>
            </div>
          </div>
          <div class="card-footer border-0 px-4 py-5"
            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid: <span class="h2 mb-0 ms-2">Rs.<?php echo $total ?></span></h5>
          </div>
          <?php
    }
    ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<script>
    window.jsPDF =window.jspdf.jsPDF;
    let doc= new jsPDF();
    let elementHTML = document.body;
    doc.html(elementHTML, {
        callback: function(doc){
            doc.save('santa.pdf');
        },
        x:15,
        y:15,
        width:160,
        windowWidth:760
    });
</script>