<?php
include 'config.php';

extract($_POST);
if(isset($_POST['nameSend']) && isset($_POST['emailSend']) && isset($_POST['phoneSend']) && isset($_POST['addressSend'])){
    $sql = "INSERT into users (name, email, phone, address) values('$nameSend','$emailSend','$phoneSend','$addressSend')";

    $result = mysqli_query($conn, $sql);
}
?>