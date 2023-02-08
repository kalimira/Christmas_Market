<?php
session_start(); 
if(isset($_SESSION['use']))
 {
    header("Location:profile.html"); 
 }
    if (isset($_POST['uname']) && isset($_POST['psw'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "christmas_market";
        $conn = new mysqli($servername, $username, $password, $database) or die("Connect failed: %s\n". $conn -> error);
        $user = $_POST['uname'];
        $psw = $_POST['psw'];
        $sql = "SELECT * FROM sellers WHERE username='$user'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pass = $row["pass"];
                if ($psw === $pass){
                    $_SESSION['use']=$user;
                    header("Location: map.html");
                    die;
                }
                else{
                   header("Location: index.html");
                   die;
                }
            }
        } else {
            header("Location: index.html");
            die;
        }
}
    else{
        header("Location: login.html");
        die;
    }
    $con->close();
?>