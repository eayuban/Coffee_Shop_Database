    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you ADDED MORE TEA/BEANS to the Database</h1>
        <?php
            session_start();
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            addIngredient($conn);
            closeDatabaseConn($conn);
            
            function addIngredient($conn){            
                $ingreName = $_POST[ingreName];
                $company = $_POST[company];
                $location = $_SESSION[empLocation];
                $increaseBy = $_POST[amountToAdd];
                
                $sql = "UPDATE tea_leaves_coffee_beans
                        SET Amount = Amount + $increaseBy
                        WHERE
                        InvenName = '$ingreName' AND
                        InvenLocation = '$location' AND
                        Company = '$company'";
            
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
            die("Disconnected from Database.");
        }
        
        ?>
    </body>