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
                echo "<h1>You are here because you ADDED a DRINK to the Database</h1>";
                addDrink($conn);
            }
            else{
                echo "<h1>You are here because you REMOVED a DRINK from the Database</h1>";

                removeDrink($conn);
            }
            closeDatabaseConn($conn);
            
            function addDrink($conn){
            
                echo "Adding $_POST[drinkName] to the database!<br>";
            
                $drinkName = $_POST[drinkName];
                $recipe = $_POST[recipe];
                $type = $_POST[drinkType];
                $price = $_POST[price];
                
                $sql = "INSERT
                        INTO drink (Name, Recipe, Type, Price)
                        VALUES
                        ('$drinkName', '$recipe', '$type', '$price')";
            
                if($conn->query($sql) == TRUE){
                    echo "Added $drinkName successfully!<br>";
                }
                else{
                    echo "$drinkName was not added successfully...<br>".$conn->error."<br>";
                }
            }
            
            function removeDrink($conn){
            
                echo "Removing $_POST[drinkName] from the database!<br>";
            
                $drinkName = $_POST[drinkName];
                
                $sql = "DELETE
                        FROM drink
                        WHERE
                        Name = '$drinkName'";
            
                if($conn->query($sql) == TRUE){
                    echo "Removed $drinkName successfully!<br>";
                }
                else{
                    echo "$drinkName was not removed successfully...<br>".$conn->error."<br>";
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