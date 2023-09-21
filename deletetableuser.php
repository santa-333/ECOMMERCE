​<?php
include ('authen.php');
if (isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $sql = "DELETE FROM `usertable` WHERE userid ='$id'";
     $result = mysqli_query($data,$sql);
     if ($result == TRUE) {
        echo "Record deleted successfully.";
        header('Location: adminutable.php');
    }else{
        echo "Error:" . $sql . "<br>" . $data->error;
    }
}
?>