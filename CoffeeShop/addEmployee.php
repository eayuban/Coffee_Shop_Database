<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you ADDED an EMPLOYEE to the Database</h1>
        <?php
            session_start();
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            addEmployee($conn);
            closeDatabaseConn($conn);
            
            function addEmployee($conn){
            
                echo "Adding $_POST[name] to the database!<br>";
            
                $sin = $_POST[sin];
                $newPassword = $_POST[newPassword];
                $confirmation = $_POST[confirmation];
                $name = $_POST[name];
                
                if(strcmp($newPassword,$confirmation) == -1){
                    echo("Your passwords do not match!<br>");
                    closeDatabaseConn($conn);
                }
                
                $sql = "INSERT
                        INTO employee (SIN, Name, ManagerSIN, Password, Location)
                        VALUES
                        ('$sin', '$name', '$_SESSION[empSIN]', '$newPassword', '$_SESSION[empLocation]')";
            
                    if($conn->query($sql) == TRUE){
                    echo "Added $_POST[name] successfully!<br>";
                }
                else{
                    echo "$_POST[name] was not added successfully...<br>".$conn->error."<br>";
                }
            
                echo "Showing the current state of the 'employee' table:<br>";
            
                $sql = "SELECT
                        *
                        FROM
                        employee";
            
                $result = $conn->query($sql);
            
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "SIN: ".$row["SIN"]." - Name: ".$row["Name"]." - Manager: ".
                                $row["ManagerSIN"]."<br>";
                    }
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

