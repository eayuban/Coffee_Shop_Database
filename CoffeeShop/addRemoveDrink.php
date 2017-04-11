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
            
            if (strcmp($_POST[AddOrUpdateOrRemove], "Add") == 0){
                echo "<h1>You are here because you ADDED a DRINK to the Database</h1>";
                addDrink($conn);
            }
            if (strcmp($_POST[AddOrUpdateOrRemove], "Update") == 0){
                echo "<h1>You are here because you UPDATED a DRINK in the Database</h1>";
                updateDrink($conn);
            }
            if(strcmp($_POST[AddOrUpdateOrRemove], "Remove") == 0){
                echo "<h1>You are here because you REMOVED a DRINK from the Database</h1>";

                removeDrink($conn);
            }
        
            closeDatabaseConn($conn);
            echo "<script type='text/javascript'> window.location.replace('modifypage.php'); </script>";

            
            function addDrink($conn){
            
                echo "Adding $_POST[drinkName] to the database!<br>";
            
                $drinkName = $_POST[drinkName];
                $recipe = $_POST[recipe];
                $type = $_POST[drinkType];
                $price = $_POST[price];
                
                $sql = "INSERT
                        INTO drink (Name, Recipe, Type, Price, Location)
                        VALUES
                        ('$drinkName', '$recipe', '$type', '$price', '$_SESSION[empLocation]')";
            
                if($conn->query($sql) == TRUE){
                    echo "Added $drinkName successfully!<br>";
                }
                else{
                    echo "$drinkName was not added successfully...<br>".$conn->error."<br>";
                }
            }
        
                       
            function updateDrink($conn){
                echo "Updating $_POST[drinkName] in the database!<br>";
                
                $drinkName = $_POST[drinkName];
                
                //verify that the drink is in the database
                $sql = "SELECT 
                        *
                        FROM drink
                        WHERE
                        Name = '$drinkName' AND
                        Location = '$_SESSION[empLocation]'";
                $result = $conn->query($sql);
           
                if ($result->num_rows > 0){
                  
                    $row = $result->fetch_assoc();
                    
                    $recipe = $_POST[recipe];
                    $type = $_POST[drinkType];
                    $price = $_POST[price];
                    
                    if(empty($_POST[recipe])){
                    
                        $recipe = $row["Recipe"];
                    }
                    if(empty($_POST[drinkType])){
                      
                        $type = $row["Type"];
                    }
                    if(empty($_POST[price])){
                     
                        $price = $row["Price"];
                    }
                    $sql = "UPDATE drink
                            SET Recipe='$recipe',Type='$type',Price='$price'
                            WHERE 
                            Name = '$drinkName' AND
                            Location = '$_SESSION[empLocation]'";  
                    if($conn->query($sql) == TRUE){
                    echo "Updated $drinkName successfully!<br>";
                }
                else{
                    echo "$drinkName was not updated successfully...<br>".$conn->error."<br>";
                }
                }
                else{
                    echo "Invalid drink name<br>".$conn->error."<br>";
                }
                
                        
            }
            function removeDrink($conn){
            
                echo "Removing $_POST[drinkName] from the database!<br>";
            
                $drinkName = $_POST[drinkName];
                
                $sql = "DELETE
                        FROM drink
                        WHERE
                        Name = '$drinkName'
                        AND Location = '$_SESSION[empLocation]'";
            
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
        }
        
        ?>
    </body>
