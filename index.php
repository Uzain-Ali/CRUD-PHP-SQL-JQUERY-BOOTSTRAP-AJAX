<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>CRUD Application</title>
</head>
<body>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="completename">Name</label>
    <input type="text" class="form-control" id="completename"  placeholder="Enter Name">
  </div>
      <div class="form-group">
    <label for="completeemail">Email</label>
    <input type="email" class="form-control" id="completeemail"  placeholder="Enter Email">
  </div>
      <div class="form-group">
    <label for="completephone">Phone Number</label>
    <input type="number" class="form-control" id="completephone"  placeholder="Enter Phone Number">
  </div>
      <div class="form-group">
    <label for="completeaddress">Address</label>
    <input type="text" class="form-control" id="completeaddress"  placeholder="Enter Address">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>

      </div>
    </div>
  </div>
</div>
    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="updateName">Name</label>
    <input type="text" class="form-control" id="updateName"  placeholder="Enter Name">
  </div>
      <div class="form-group">
    <label for="updateEmail">Email</label>
    <input type="email" class="form-control" id="updateEmail"  placeholder="Enter Email">
  </div>
      <div class="form-group">
    <label for="updatePhone">Phone Number</label>
    <input type="number" class="form-control" id="updatePhone"  placeholder="Enter Phone Number">
  </div>
      <div class="form-group">
    <label for="updateAddress">Address</label>
    <input type="text" class="form-control" id="updateAddress"  placeholder="Enter Address">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" onclick="updateData()">Update</button>
        <input type="hidden" id="hiddenData">
      </div>
    </div>
  </div>
</div>



    <div class="container my-3">
        <h1 class="text-center">CRUD APPLICATION</h1>
        <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#completeModal">
  Add User
</button>
<div class="displayDataTable"></div>
    </div>
    


<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
      displayData();
    });
    function displayData(){
        var displayData="true";
        $.ajax({
            url:"display.php",
            type:'post',
            data:{
                displaySend : displayData
            },
            success: function(data, status){
                $('.displayDataTable').html(data);
            }
        })
    }

    function adduser(){
        var name = $('#completename').val();
        var email = $('#completeemail').val();
        var phone = $('#completephone').val();
        var address = $('#completeaddress').val();

        $.ajax({
            url:'insert.php',
            type: 'post',
            data:{
                nameSend:name,
                emailSend:email,
                phoneSend:phone,
                addressSend:address
            },
            success:function(data, status){
                //function to display data
                console.log(data);
                $("#completeModal").modal('hide');
                displayData();
            }
        })
    }

    //Delete user
    function DeleteUser(deleteId){
      $.ajax({
        url : "delete.php",
        type:'post',
        data:{
          deleteSend: deleteId
        },
        success: function(data, status){
          displayData();
        }
      })
    }

    //Update Function
    function getData(updateId){
      $("#hiddenData").val(updateId);

      $.post("update.php", {updateId:updateId},function(data, status){
        var userId = JSON.parse(data);
        $('#updateName').val(userId.name);
        $('#updateEmail').val(userId.email);
        $('#updatePhone').val(userId.phone);
        $('#updateAddress').val(userId.address);

      } )
      $("#updateModal").modal('show');
    }

    //Update Data
    function updateData(){
      var updateName = $("#updateName").val();
      var updateEmail = $("#updateEmail").val();
      var updatePhone = $("#updatePhone").val();
      var updateAddress = $("#updateAddress").val();
      var hiddenData = $("#hiddenData").val();

      $.post("update.php", {
        updateName:updateName,
        updateEmail:updateEmail,
        updatePhone:updatePhone,
        updateAddress:updateAddress,
        hiddenData: hiddenData
      },function(data, status){
        $('#updateModal').modal('hide');
        displayData();
      });
    }
</script>
</body>
</html>