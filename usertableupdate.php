<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .center{
        display: flex;
        justify-content: center;
    }
    .main{
        background-color: #AFD3E2;
        width: 25%;height: 300px;
    }
    h3{
        text-align: center;
    }
    .user1{
        margin-top: 10px;
        padding-left: 60px;
    }
    .phone{
        margin-top: 10px;
        padding-left: 60px;
    }
    .mail{
        margin-top: 10px;
        padding-left: 60px;
    }
    .pass1{
        margin-top: 10px;
        padding-left: 60px;
    }
    .img{
        margin-top: 10px;
        padding-left: 60px;
    }
    .user1 input{
        margin-top: 10px;
    }
    .phone input{
        margin-top: 10px;
    }
    .mail input{
        margin-top: 10px;
    }
    .pass1 input{
        margin-top: 10px;
    }
    .submit{
        margin-top: 10px;
        margin-left: 125px;
    }
</style>
</head>
<body>
    <div class="center">
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="login">
            <h3>UPDATE DETAILS</h3>
                <div class="form user1"><input type="text" name="name"  value="<?php echo $_GET['Name']?>" required >
                </div>
                <div class="form phone">
                    <input type="number" name="Mobile" value="<?php echo $_GET['Mobile']?>" required >
                </div>
                <div class="form img">
                <input type="file" name="file"  required>
                </div>
                <div class="form mail">
                    <input type="Email" name="mail" value="<?php echo $_GET['Email']?>"  required >
                </div>
                <div class="form pass1">
                <input type="password" name="pass" value="<?php echo $_GET['Password']?>"  required >
                </div>
                <div class="form submit">
                <input type="submit" value="update" name="sub" >
                </div>
            </div>
            </form>
            </div>  
    </div>      
</body>
<!-- <script>
        $(".submit")[0].click(function(e){
			$.ajax({
				// Our sample url to make request
				url:'usertable2.php',

				// Type of Request
				type: 'POST',
                data:{'userid':$('.id1')[0].val()},
				// Function to call when to
				// request is ok
				success: function (data) {
					console.log(data)
				}
			});
		})
	</script> -->
</html>
<?php
include ('authen.php');
if(isset($_POST['sub'])){
    echo "asnda";
$id=$_GET['userid'];
$name=$_POST['name'];
$pass=$_POST['pass'];
$mobile=$_POST['Mobile'];
$mail=$_POST['mail'];
$tab='usertable';
// mysqli_num_rows(mysqli_query($data,'selects * from sample'));
    $targetDir = "uimages/";
// mysqli_num_rows(mysqli_query($data,'selects * from sample'));
if(!empty($_FILES["file"]["name"])){
    echo "gudFVGGYDFFVD";
  // $fileName = basename($_FILES["file"]["name"]);
  $fileName = rand(1000,10000)."-".$_FILES["file"]["name"];
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  if(in_array($fileType, array('jpg','png','jpeg','gif','webp'))){
      echo "gud";
  if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
    echo "dai";
    // $update="UPDATE 'producttable' SET image='$fileName' where id=$id";
    $mysq="UPDATE `usertable` SET Name='$name',Password='$pass',Mobile='$mobile',Email='$mail',image='$fileName'
    WHERE userid=$id";
    $sq= mysqli_query($data,$mysq);
   if($sq){
    $outMessageorError = "The file ".$fileName. " has been updated successfully.";
    header("location:adminutable.php");
   }
    header("location:adminutable.php");
}
else{
    echo "nooooooo";
}
  }
  else {
    echo "pls select file to upload";
}
}
}
?>