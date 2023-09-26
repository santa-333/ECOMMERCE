<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    
</head>
<body>
    <form action="search.php" method="post" id="form">
        <input type="text" id="inp">
        <button>Search</button>
    </form>
    <div class="santa"></div>
</body>
	<script>
        $("#inp").keyup(function(e){
			$.ajax({
				// Our sample url to make request
				url:'searchproduct.php',

				// Type of Request
				type: 'POST',
                data:{name:$('#inp').val()},
				// Function to call when to
				// request is ok
				success: function (data) {
					$(".santa").html(data)
				}
			});
		})
	</script>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>USER Database</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
        .t1{
            background-color: lawngreen;
        }
        </style>
</head>

<body>
    <div class="container">
        <h2>Product Details</h2>
        <a class="btn btn-info" href="productadd.php">ADD</a>
        <a class="btn btn-info" href="adminbtns.php">Admin panel</a>
        <table class='table table-light'>
<thead>
 <tr>
      <th>Productid</th>
     <th>ProductName</th>
     <th>ProductDescription</th>
     <th>Image</th>
     <th>Stock</th>
     <th>Price</th>
     <th>Quantity</th>    
     <th>CRUD</th>  
     <th>Last Modified</th>      

 </tr>
</thead>
</body>
</html>

<?php 
session_start();
if(!isset($_SESSION['Name'])){
    header('location:adminlogin.php');
}
include ("authen.php");
$query = "SELECT * from `producttable`";
$ref = mysqli_query($data,$query);
$count = 1;
echo '<tbody>';
while($w=mysqli_fetch_assoc($ref)){
    echo '<tr class="tablerow">
    <td class="align-middle">'.$w['id'].'</td>
    <td class="align-middle">'.$w['Name'].'</td>
    <td class="align-middle">'.$w['Description'].'</td>
    <td class="align-middle"><img src="images/'.$w['image'].'" height="80px" width="80px"></td>
    <td class="align-middle">'.$w['stock'].'</td>
    <td class="align-middle">'.$w['Price'].'</td>
    <td class="align-middle">'.$w['Quantity'].'</td>
    <td class="align-middle"><a href="producttableupdate.php?id='.$w['id'].'&name='.$w['Name'].'&productdesc='.$w['Description'].'&quantity='.$w['Quantity'].'&price='.$w['Price'].'&image='.$w['image'].'"" class="btn btn-warning">Edit</a>
    <a href="deleteproduct.php?id='.$w['id'].'" class="btn btn-danger">Delete</a></td>
    <td class="align-middle">'.$w['Last_Modified'].'</td>
    </tr>';
    $count++;
}
 
echo '</tbody>
</table>'
?>