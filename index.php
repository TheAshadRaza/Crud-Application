<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud-php</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">*</button>
      </div>
      <div class="modal-body">

 <!-- // form of modal start from here        -->
      <form>
  <div class="mb-3">
    <label for="Name"  class="form-label">Name</label>
    <input type="text" class="form-control" id="Name"  placeholder="Enter your name">
  </div>

  <div class="mb-3">
    <label for="Email"  class="form-label">Email</label>
    <input type="email" class="form-control" id="Email"  placeholder="Enter your email">
    <div id="Email" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  
  <div class="mb-3">
    <label for="Phone"  class="form-label">Phone</label>
    <input type="number" class="form-control" id="Phone" placeholder="Enter your Number">
  </div>

  <div class="mb-3">
    <label for="Place" class="form-label">Place</label>
    <input type="text" class="form-control" id="Place"  placeholder="Enter your Place">
  </div>

  <button type="submit" class="btn btn-primary"  onclick="adduser()" >Submit</button>
</form>
  <!-- form close here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Update Modal -->

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">*</button>
      </div>
      <div class="modal-body">

 <!-- // form of modal start from here        -->
      <form>
  <div class="mb-3">
    <label for="updateName"  class="form-label">Name</label>
    <input type="text" class="form-control" id="updateName"  placeholder="Enter your new name">
  </div>

  <div class="mb-3">
    <label for="updateEmail"  class="form-label">Email</label>
    <input type="email" class="form-control" id="updateEmail"  placeholder="Enter your new email">
    <div id="Email" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  
  <div class="mb-3">
    <label for="updatePhone"  class="form-label">Phone</label>
    <input type="number" class="form-control" id="updatePhone" placeholder="Enter your New Number">
  </div>

  <div class="mb-3">
    <label for="updatePlace" class="form-label">Place</label>
    <input type="text" class="form-control" id="updatePlace"  placeholder="Enter your New Place">
  </div>

  <button type="submit" onclick="updateDetails()" class="btn btn-primary">Update</button>
</form>
  <!-- form close here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="hidden" id="hiddenData">
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>






<div class="container my-3">
<h1 class="text-center text-light bg-dark py-5">PHP CRUD operation </h1>
<button type="button"  class="btn btn-warning text-dark my-5" data-bs-toggle="modal" data-bs-target="#completeModal">
  Add New Users
</button>
<div class="table" id="displayDataTable"></div>
</div>
    <!-- Bootstrap javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Jquery Cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        displayData();
      });
      // display function

      function displayData(){
        var displayData="true";
        $.ajax({
          url:"display.php",
          type:'post',
          data:{
            displaySend:displayData
          },
          success:function(data,status){
            $('#displayDataTable').html(data);
          }
        });
      }
      
      function adduser(){
        var nameSend=$('#Name').val();
        var emailSend=$('#Email').val();
        var phoneSend=$('#Phone').val();
        var placeSend=$('#Place').val();

        $.ajax({
            url:"insert.php",
            type:'post',
            data:{
              Name:nameSend,
              Email:emailSend,
              Phone:phoneSend,
              Place:placeSend
            },
            success:function(data,status){
              // Function to display data
              // console.log(status);
              $('#completeModal').modal('hide');
              displayData();
            }
        });
      }
      // Delete function
      function DeleteUser(deleteid){
        $.ajax({
          url:"delete.php",
          type:'post',
          data:{
            deletesend:deleteid
          },
          success:function(data,status){
            displayData();
          }
        });
      }
     // Update function()
     function Getdetails(updateid){
      $('#hiddenData').val(updateid);
      $.post("update.php",{updateid:updateid},function(data,status){

        var userid=JSON.parse(data);

        $('#updateName').val(userid.name);
        $('#updateEmail').val(userid.email);
        $('#updatePhone').val(userid.phone);
        $('#updatePlace').val(userid.place);
      });
      $('#updateModal').modal('show');
     }
     // Function for post update in database as well as display changes .
     function updateDetails(){
     var updatename=$('#updateName').val();
     var updateemail=$('#updateEmail').val();
     var updatephone=$('#updatePhone').val();
     var updateplace=$('#updatePlace').val();
     var hiddendata=$('#hiddenData').val();


     $.post("update.php",{
      updatename:updatename,
      updateemail:updateemail,
      updatephone:updatephone,
      updateplace:updateplace,
      hiddendata:hiddendata
     },function(data,status){
      $('#updateModal').modal('hide');
      displayData();
     });

     }
    </script>
</body>
</html>