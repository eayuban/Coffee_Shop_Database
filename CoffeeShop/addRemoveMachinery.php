    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <?php
            session_start();
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            if (strcmp($_POST[AddOrRemove], "Add") == 0){
                echo "<h1>You are here because you ADDED MACHINERY to the Database</h1>";
                addMachinery($conn);
            }
            else{
                echo "<h1>You are here because you REMOVED MACHINERY from the Database</h1>";
                removeMachinery($conn);
            }
            closeDatabaseConn($conn);
            
            function addMachinery($conn){
            
                echo "Adding $_POST[machineName] to the database!<br>";
            
                $machineName = $_POST[machineName];
                $machineType = $_POST[machineType];
                $year = $_POST[manufactureYear];
                $location = $_SESSION[empLocation];
                
                $sql = "INSERT
                        INTO machinery (Type, ManufactureYear, Location, Name)
                        VALUES
                        ('$machineType', '$year', '$location', '$machineName')";
            
                if($conn->query($sql) == TRUE){
                    echo "Added $machineName successfully!<br>";
                }
                else{
                    echo "$machineName was not added successfully...<br>".$conn->error."<br>";
                }
            }
            
            function removeMachinery($conn){
            
                echo "Removing $_POST[machineName] from the database!<br>";
            
                $machineType = $_POST[machineType];
                $year = $_POST[manufactureYear];
                $location = $_SESSION[empLocation];
                
                $sql = "DELETE
                        FROM machinery
                        WHERE
                        Type = '$machineType' AND
                        ManufactureYear = '$year' AND
                        Location = '$location'";
            
                if($conn->query($sql) == TRUE){
                    echo "Removed $_POST[machineName] successfully!<br>";
                }
                else{
                    echo "$_POST[machineName] was not removed successfully...<br>".$conn->error."<br>";
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
