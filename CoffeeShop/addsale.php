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
            $password = "cpsc4712017";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            

            addSale($conn);
            updatePoints($conn);
            closeDatabaseConn($conn);
            
            function addSale($conn){
            
                echo "Adding sale of $_POST[drinkType] to the database!<br>";
            
                $drinkType = $_POST[drinkType];
                $custEmail = $_POST[custEmail];
                $date = $_POST[date];
                
                $sql = "INSERT
                        INTO sales (Drink, Date, CustomerInfo, Location)
                        VALUES
                        ('$drinkType', '$date', '$custEmail','$_SESSION[empLocation]')";
            
                if($conn->query($sql) == TRUE){
                    echo "Added sale of $drinkType successfully!<br>";
                }
                else{
                    echo "Sale of $drinkType was not added successfully...<br>".$conn->error."<br>";
                }
            }
        
            function updatePoints($conn){
                echo "Updating points balance of $_POST[custEmail] in the database!<br>";
                
                $drinkType = $_POST[drinkType];
                $custEmail = $_POST[custEmail];
                
                //determine points to add
                $sql="SELECT Price 
                      FROM drink 
                      WHERE Name='$drinkType'";
                
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    
                    echo "got inside price<br>";
                    
                    $row = $result->fetch_assoc();
                    $price = $row["Price"];
                    
                    echo "price is $price<br>";
                    
                    $multiplier = 100;
                    $pointsToAdd = (int) $price * $multiplier;
                    
                    echo "Points to add $pointsToAdd<br>";
                    
                    $sql = "SELECT Points_Balance
                            FROM customer
                            WHERE Email='$custEmail'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0){
                        
                        echo "got inside pull points balance<br>";
                        $row = $result->fetch_assoc();
                        $currentBalance=$row["Points_Balance"];
                        
                        echo "current balance is $currentBalance<br>";
                        
                        $newPoints = $currentBalance + $pointsToAdd;
                        
                        echo"new points $newPoints<br>";
                        
                        $sql = "UPDATE customer
                            SET Points_Balance= '$newPoints'
                            WHERE Email = '$custEmail'";
                        
                        if($conn->query($sql) == TRUE){
                            echo "Points Balance of $custEmail was successfully updated!<br>";
                        }
                        else{
                            echo "Points balance of $custEmail was not updated successfully...<br>".$conn->error."<br>";
                        }
                    }
                }
                else{
                    echo "Points balance of $custEmail was not updated successfully...<br>".$conn->error."<br>";
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
