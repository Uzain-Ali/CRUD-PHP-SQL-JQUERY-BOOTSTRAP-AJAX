<?php
include 'config.php';

if(isset($_POST['updateId'])){
    $userId = $_POST['updateId'];

    $sql = "SELECT * FROM users WHERE id=$userId";
    

    $result = mysqli_query($conn, $sql);
    $response = array();
    while($row = mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo json_encode($response);
}else{
    echo $response['status'] = 200;
    echo $response['message'] = "Data not Found";
    echo json_encode($response); // Return response as JSON
}
?>