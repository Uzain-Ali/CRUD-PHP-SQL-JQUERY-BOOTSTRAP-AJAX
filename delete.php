<?php
include 'config.php';

if(isset($_POST['deleteSend'])){
    $unique = $_POST['deleteSend'];
    $sql = "DELETE FROM users where id=$unique";
    $result = mysqli_query($conn, $sql);
}
?>