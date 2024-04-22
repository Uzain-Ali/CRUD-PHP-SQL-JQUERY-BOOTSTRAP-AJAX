<?php
include 'config.php';

if(isset($_POST['displaySend'])){
    // $table = "<table>
    // <thead>
    //   <tr>
    //     <th>S.No</th>
    //     <th>Name</th>
    //     <th>Email</th>
    //     <th>Mobile</th>
    //     <th>Address</th>
    //     <th>Operations</th>
    //   </tr>
    // </thead>";
    // $table = "<table class="table">
    // <thead class="thead-dark">
    //   <tr>
    //     <th scope="col">S.No</th>
    //     <th scope="col">Name</th>
    //     <th scope="col">Email</th>
    //     <th scope="col">Mobile</th>
    //     <th scope="col">Address</th>
    //     <th scope="col">Operations</th>
    //   </tr>
    // </thead>";

          $table = "<table class=\"table\">
      <thead class=\"thead-dark\">
      <tr>
      <th scope=\"col\">S.No</th>
      <th scope=\"col\">Name</th>
      <th scope=\"col\">Email</th>
      <th scope=\"col\">Mobile</th>
      <th scope=\"col\">Address</th>
      <th scope=\"col\">Operations</th>
      </tr>
      </thead>";

    $sql = "SELECT * FROM users";

    $result = mysqli_query($conn, $sql);
    $number = 1;
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $table .= '<tr>
        <th scope="row">'.$number.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$phone.'</td>
        <td>'.$address.'</td>
        <td>
            <button class="btn btn-dark" onclick="getData('.$id.')">Update</button>
            <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
        </td>

      </tr>'; 
      $number++;
    }
    $table.='</table>';
    echo $table;
}
?>
