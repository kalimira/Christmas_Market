<?php
        $q = $_REQUEST["q"];
        $id = (int) $q;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "christmas_market";
        $conn = new mysqli($servername, $username, $password, $database) or die("Connect failed: %s\n". $conn -> error);
        $sql = "SELECT * FROM houses WHERE number=$id";
        $result = $conn->query($sql);
        if ($result != false && $result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            if ($row['status'] != 'free')
            {
                $sql = "SELECT * FROM houses H JOIN sellers S ON H.tenant=S.username WHERE H.number=$id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                    while($row1 = $result->fetch_assoc()) 
                    {
                        echo "This house is reserved for " . $row1['full_name'] . "<br>" . "She/He sells " . $row1['goods'] . ". "  . "Average price: " .  $row1['average_price']. "lv" . "<br>";
                    }
                }   
                    
            }
            else
            {
                echo "House № " .  $row["number"] . " is free " . "Size: " . $row["size"] . "m2";
            }    
        }
               
        
        $conn->close();
    
?>