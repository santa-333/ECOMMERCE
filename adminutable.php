<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
				url:'Searchuser.php',

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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <h2>user Details</h2>
        <a class="btn btn-info" href="userregister.php">ADD</a>
        <a class="btn btn-info" href="adminbtns.php">Admin panel</a>
        
<table class="table table-dark">
    <thead>
        <tr>
        <th>USERID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>CRUD</th>

    </tr>
    </thead>
    <tbody>
        <?php
                session_start();
                if(!isset($_SESSION['Name'])){
                    header('location:adminlogin.php');
                }
                include ("authen.php");
                $sql = "SELECT * FROM usertable";
                $result = $data->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr class="tablerow">
                    <td class="align-middle"><?php echo $row['userid']; ?></td>
                    <td class="align-middle"><?php echo $row['Name']; ?></td>
                    <td class="align-middle"><?php echo $row['Mobile']; ?></td>
                    <td class="align-middle"><?php echo $row['Email']; ?></td>
                    <td class="align-middle"><?php echo $row['Password']; ?></td>
                    <td class="align-middle"><img src="uimages/<?php echo $row['image'];?>" alt="" height="100px" width="100px"></td>
                    <td class="align-middle"><a class="btn btn-info" href="usertableupdate.php?userid=<?php echo $row['userid'].'&Name='.$row['Name'].'&Email='.$row['Email'].'&Password='.$row['Password'].'&Mobile='.$row['Mobile'] ;?>">Edit</a>
                     &nbsp;
                     <a class="btn btn-danger" href="deletetableuser.php?userid=<?php echo $row['userid']; ?>">Delete</a>
                    </td>
                    </tr>
        <?php       }
            }
        ?>
    </tbody>
</table>
    </div>
</body>
</html>