<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you attempted to LOGIN!</h1>
        <?php
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            $username = $_POST[userData];
            
            if (ctype_digit($username) == true){
                employeeLogin($conn, $username);
            }
            else{
                customerLogin($conn, $username);
            }
            closeDatabaseConn($conn);
            
        function employeeLogin($connection, $sin){
            echo "Attempting to login to employee with SIN: '$sin'<br><br>";

            $password = $_POST[password];
            
            $sql = "SELECT
                    *
                    FROM
                    employee
                    WHERE
                    SIN = '$sin'";
            
            $result = $connection->query($sql);
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if(strcmp($row[Password], $password) == 0){
                    echo "Employee Sign in Successful!<br><br>";
                    echo "Welcome $row[Name], your SIN is $row[SIN]<br>";
                }
                else{
                    echo "Wrong password!";
                }
            }
            else{
                echo "Invalid SIN!";
            }
            
        }

        function customerLogin($connection, $email){
            echo "Attempting to login to customer with email: '$email'<br><br>";

            if (substr_count($email, '@') != 1){
                echo "Login Information not valid!";
                closeDatabaseConn($connection);
            }
            
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
            
        ?>
    </body>