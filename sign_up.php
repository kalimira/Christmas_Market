<?php
    echo 'ji';
    if (isset($_POST['uname']) && isset($_POST['psw'])){
        $servername = "localhost";
        $usernamedb = "root";
        $password = "";
        $database = "christmas_market";
        $conn = new mysqli($servername, $usernamedb, $password, $database) or die("Connect failed: %s\n". $conn -> error);
        $username = $_POST['uname'];
        $pass = $_POST['psw'];    
        $name = $_POST['name'];    
        $email = $_POST['email'];
        $goods = $_POST['goods'];
        $average_price = $_POST["price"];
    
        if($username != "" && $pass != "" && $name != "" && $email != "" && $goods != "" && $average_price != "")
        { 
            echo 'ji';
            $sql = "INSERT INTO sellers  (username, pass, full_name, email, goods, average_price) VALUES ('$username', '$pass', '$name', '$email', '$goods', '$average_price')";
            if ($conn->query($sql) === TRUE) 
            {
                echo "New record created successfully <br>";
                header("Location: index.html");
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    else
    {
        echo "hi";
        //header("Location: index.html"); 
    }
    $conn->close();
?>
