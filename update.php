<?php
include 'connect.php';

if(isset($_POST['updateid'])){
    $user_id=$_POST['updateid'];

    $sql="Select * from `bcrud` where id=$user_id";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="Invalid or data not found";
}



// Update query

if(isset($_POST['hiddendata'])){
    $uniqueid=$_POST['hiddendata'];
    $name=$_POST['updatename'];
    $email=$_POST['updateemail'];
    $phone=$_POST['updatephone'];
    $place=$_POST['updateplace'];

    $sql="update `bcrud` set name='$name',email='$email',phone='$phone',place='$place' where id=$uniqueid";
    
    $result=mysqli_query($con,$sql);

}



?>