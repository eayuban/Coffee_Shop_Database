<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you attempted to LOGIN as a CUSTOMER</h1>
        <?php
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            customerLogin($conn);
            closeDatabaseConn($conn);
        
        function connectToDatabase($server, $user, $psswrd, $database){
            $conn = new mysqli($server, $user, $psswrd, $database);
            
            if ($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            else{
                echo "Connected to Database $database...<br>";
                return $conn;
            }
        }
        
        function closeDatabaseConn($dbConn){
            $dbConn -> close();
            die("Disconnected from Database.");

        }

        function customerLogin($connection){
            echo "Attempting to login to customer with email: '$_POST[email]'<br><br>";

            $email = $_POST[email];
            $password = $_POST[password];
            
            $sql = "SELECT
                    *
                    FROM
                    customer
                    WHERE
                    Email = '$email'";
            
            $result = $connection->query($sql);
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if(strcmp($row[Password], $password) == 0){
                    echo "Customer Sign in Successful!<br><br>";
                    echo "Welcome $row[Name]!<br>";
                    echo "Your birthdate is $row[Birthday]!<br>";
                    echo "Your points balance is $row[Points_Balance] <br>";
                }
                else{
                    echo "Wrong password!";
                }
            }
            else{
                echo "Invalid Email!";
            }
        }

        
        ?>
        <h2>Customer Options!</h2>
        <form action="redeemReward.php" method="post">
            <a href="redeemReward.php">Redeem Rewards!</a>
        </form>
    </body>