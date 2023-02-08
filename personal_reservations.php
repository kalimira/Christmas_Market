<?php
    session_start(); 
    if(!isset($_SESSION['use']))
     {
        header("Location:login.html"); 
     }
    $user = $_SESSION['use'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "christmas_market";
    $conn = new mysqli($servername, $username, $password, $database) or die("Connect failed: %s\n". $conn -> error);
    $sql = "SELECT * FROM houses H JOIN sellers S ON H.tenant=S.username WHERE S.username='$user'";
    $result = mysqli_query($conn, $sql);
    echo "Hello " . $user,  "<br>", "Your reservations include: ","<br>","<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "House №: " . $row['number'], "<br>","<br>";
    }
    $conn->close();

    
?>