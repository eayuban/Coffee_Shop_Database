<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you attempted to LOGIN as an EMPLOYEE</h1>
        <?php
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            employeeLogin($conn);
            closeDatabaseConn($conn);
            
        function employeeLogin($connection){
            echo "Attempting to login to employee with SIN: '$_POST[sin]'<br><br>";

            $sin = $_POST[sin];
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
                    echo "Welcome $row[Name], your SIN is $row[SIN]";
                }
                else{
                    echo "Wrong password!";
                }
            }
            else{
                echo "Invalid SIN!";
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