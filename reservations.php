<?php
session_start();
if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
    header("Location:login.html");  
}
else{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "christmas_market";
    $conn = new mysqli($servername, $username, $password, $database) or die("Connect failed: %s\n". $conn -> error);
    if (isset($_POST['house_reserve'])){
        $house = $_POST['house_reserve'];
        $num = (int) $house;
        $username = $_SESSION['use'];
        $sql = "UPDATE houses SET tenant='$username', status='busy' WHERE status='free' AND number='$num'";
        $result = $conn->query($sql);
    }
    if (isset($_POST['house_delete'])) {
        $house = $_POST['house_delete'];
        $num = (int) $house;
        $username = $_SESSION['use'];
        $sql = "UPDATE houses SET tenant='NULL', status='free' WHERE status='busy' AND number='$num'";
        $result = $conn->query($sql);
    }
    header("Location: profile.html");
    $conn->close();
}
?>