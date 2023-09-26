<?php
include("authen.php");
$name=$_POST['name'];
$qu="select * from producttable where Name LIKE '$name%'";
$sq=mysqli_query($data,$qu);
if($name!=null){
    if(mysqli_num_rows($sq)>0){
echo "<table class='table table-success'>
    <thead>
     <tr>
          <th>id</th>
         <th>Name</th>
         <th>Description</th>
         <th>Stock</th>
         <th>Price</th>
         <th>image</th>
         <th>quantity</th>  
         <th>Crud</th>          

     </tr>
    </thead>
    <tbody> ";
while($row=mysqli_fetch_assoc($sq)){
//    echo '$one['id']'


    echo "
    <tr>
    <td>$row[id]</td>
    <td>$row[Name]</td>
    <td>$row[Description]</td>
    <td>$row[stock]</td>
    <td>$row[Price]</td>
    <td><img src='images/$row[image]'height='100px' width='100px'></td>
    <td>$row[Quantity]</td>
    <td><a href='producttableupdate.php?id=$row[id]&name=$row[Name]&productdesc=$row[Description].&quantity=$row[Quantity]&price=$row[Price]' class='btn btn-warning'>Edit</a>
    <a href='deleteproduct.php?id=$row[id]' class='btn btn-danger'>Delete</a></td>
</tr>
";
}echo "</tbody>
</table>";
}
else echo "Search not found";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>