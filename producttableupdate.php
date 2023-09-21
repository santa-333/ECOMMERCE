<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main{
            display: flex;
            justify-content: center;
        }
        .container{
            background-color: coral;
            width: 40%;
            height: 300px;
            padding: 20px;
        }
        .form{
            margin-top: 20px;
        }
        .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
        </style>
</head>
<body>
    <div class="main">
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form productname">
            <input type="text" name="pname" value="<?php  echo $_GET['name'];?>">
        </div>
        <div class="form productdesc">
            <textarea type="text" name="pdesc"  ><?php  echo $_GET['productdesc'];?></textarea>
        </div>
        <div class="form productstock">
            <label class="switch">
            <input type="checkbox" name="check" checked=false>
            <span class="slider round"></span>
            </label>
        </div>
        <div class="form productprice">
            <input type="text" name="price" value="<?php  echo $_GET['price'];?>" >
        </div>
        <div class="form productimg">
            <input type="file" name="file" required>
        </div>
        <div class="form productquantity">
            <input type="number" name="Quantity" value="<?php  echo $_GET['quantity'];?>">
        </div>
        <div class="form submit">
            <input type="submit" name="sub" >
        </div>
        </form>
    </div>
    </div>
</body>
</html>
<?php
include ('authen.php');
if(isset($_POST['sub'])){
$id=$_GET['id'];
$name=$_POST['pname'];
$pdesc=$_POST['pdesc'];
$check=$_POST['check'];
if(isset($_POST['check'])){
    $check="TRUE";
  }else{
    $check="FALSE";
  }
$price=$_POST['price'];
$quant=$_POST['Quantity'];
$tab='table';
$targetDir = "images/";
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
    $mysq="UPDATE `producttable` SET Name='$name',Description='$pdesc',stock='$check',Price=$price,image='$fileName',Quantity=$quant
    WHERE id=$id";
    $sq= mysqli_query($data,$mysq);
   if($sq){
    $outMessageorError = "The file ".$fileName. " has been updated successfully.";
   }
    header("location:producttable.php");
}
else{
    echo "nooooooo";
}
  }
}}
?>