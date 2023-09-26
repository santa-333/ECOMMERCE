<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <h2>Order Details</h2>
        <a class="btn btn-info" href="adminbtns.php">Admin panel</a>
        
<table class="table table-striped">
    <thead>
        <tr>
        <th>OrderID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>country</th>
        <th>state</th>
        <th>zipcode</th>
        <th>Order Time</th>
        <th>Total amount</th>

    </tr>
    </thead>
    <tbody>
        <?php
                session_start();
                if(!isset($_SESSION['Name'])){
                    header('location:adminlogin.php');
                }
                include ("authen.php");
                $sql = "SELECT * FROM orderstable";
                $result = $data->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr class="tablerow " style="height: 100px;">
                    <td class="align-middle"><?php echo $row['orderid']; ?></td>
                    <td class="align-middle"><?php echo $row['Name']; ?></td>
                    <td class="align-middle"><?php echo $row['email']; ?></td>
                    <td class="align-middle"><?php echo $row['address']; ?></td>
                    <td class="align-middle"><?php echo $row['country']; ?></td>
                    <td class="align-middle"><?php echo $row['state']; ?></td>
                    <td class="align-middle"><?php echo $row['zipcode']; ?></td>
                    <td class="align-middle"><?php echo $row['order_time']; ?></td>
                    <td class="align-middle"><?php echo $row['Total_price']; ?></td>
                    </tr>
        <?php       }
            }
        ?>
    </tbody>
</table>
    </div>
</body>
</html>