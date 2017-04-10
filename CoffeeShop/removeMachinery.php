    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you ADDED a MACHINERY to the Database</h1>
        <?php
            session_start();
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            removeMachinery($conn);
            closeDatabaseConn($conn);
            
            function removeMachinery($conn){
            
                echo "Adding $_POST[machineryName] to the database!<br>";
            
                $type = $_POST[machineType];
                $manufactureYear = $_POST[manufactureYear];
                $location = $_SESSION[empLocation];
                
            $sql = "DELETE
                    FROM machinery
                    WHERE Type='$type' AND
                    ManufactureYear = '$manufactureYear' AND
                    Location = '$location'";
            
                if($conn->query($sql) == TRUE){
                    echo "Removed $_POST[machineryType] successfully from $_POST[empLocation]!<br>";
                }
                else{
                    echo "$_POST[machineryName] was not removed successfully...<br>".$conn->error."<br>";
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