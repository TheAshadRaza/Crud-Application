<?php
include 'connect.php';

  $table='<table class="table">
<thead class="thead bg-primary text-light">
  <tr>
    <th scope="col">S-No</th>
    <th scope="col">Name</th>
    <th scope="col">Phone</th>
    <th scope="col">Place</th>
  </tr>
</thead>';
$sql= "SELECT * from  bcrud";
$result=mysqli_query($con,$sql);
$number=1;
while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $place=$row['place'];

    $table.=' <tr>
    <td scope="row">'.$number.'</td>
    <td>'.$name.'</td>
    <td>'.$email.'</td>
    <td>'.$place.'</td>
    <td>
   <button class="btn btn-success" onclick="Getdetails('.$id.')">Update</button>
   <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
   </td>
  </tr>';
  $number++;
}
$table.='</table>';
echo $table;




?>