​<?php
include ('authen.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `producttable` WHERE id ='$id'";
     $result = mysqli_query($data,$sql);
     if ($result == TRUE) {
        echo "Record deleted successfully.";
        header('Location: productTable.php');
    }else{
        echo "Error:" . $sql . "<br>" . $data->error;
    }
}
?>