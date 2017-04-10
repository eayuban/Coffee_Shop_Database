    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you ADDED MORE CONDIMENTS to the Database</h1>
        <?php
            session_start();
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            addCondiments($conn);
            closeDatabaseConn($conn);
            echo "<script type='text/javascript'> window.location.replace('modifypage.php'); </script>";

            
            
            function addCondiments($conn){
            
                echo "Adding $_POST[inventoryName] to the database!<br>";
            
                $condName = $_POST[condName];
                $company = $_POST[company];
                $location = $_SESSION[empLocation];
                $increaseBy = $_POST[amountToAdd];
                
                $sql = "UPDATE condiments
                        SET Amount = Amount + $increaseBy
                        WHERE
                        InvenName = '$condName' AND
                        Company = '$company' AND
                        Location = '$location'";
            
                if($conn->query($sql) == TRUE){
                    echo "Added $increaseBy units of $condName successfully!<br>";
                }
                else{
                    echo "$condName was not added successfully...<br>".$conn->error."<br>";
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
        }
        
        ?>
    </body>
