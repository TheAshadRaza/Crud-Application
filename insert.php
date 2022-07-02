<?php
include 'connect.php';

extract($_POST);
 
 $sql="INSERT INTO bcrud (name, email, phone,place)
   VALUES('$Name','$Email','$Phone','$Place')";
    $result=mysqli_query($con,$sql);

?>