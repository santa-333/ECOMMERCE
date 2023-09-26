<?php
include("authen.php");
$name=$_POST['name'];
$qu="select * from usertable where Name LIKE '$name%'";
$sq=mysqli_query($data,$qu);
if($name!=null){
    if(mysqli_num_rows($sq)>0){
echo "<table class='table table-dark'>
    <thead>
     <tr>
          <th>Userid</th>
         <th>Name</th>
         <th>Mobile</th>
         <th>Email</th>
         <th>Image</th>
         <th>crud</th>          
     </tr>
    </thead>
    <tbody> ";
while($row=mysqli_fetch_array($sq)){
//    echo '$one['id']'


    echo "
    <tr>
    <td>$row[userid]</td>
    <td>$row[Name]</td>
    <td>$row[Mobile]</td>
    <td>$row[Email]</td>
    <td><img src='images/$row[image]'height='100px' width='100px'><td>
    <td class='align-middle'><a class='btn btn-info' href='usertableupdate.php?userid=<?php echo $row[userid].'&Name='.$row[Name].'&Email='.$row[Email].'&Password='.$row[Password].'&Mobile='.$row[Mobile] ;?>'>Edit</a>
                     &nbsp;
                     <a class='btn btn-danger' href='deletetableuser.php?userid=<?php echo $row[userid]; ?>'>Delete</a>
                    </td>
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