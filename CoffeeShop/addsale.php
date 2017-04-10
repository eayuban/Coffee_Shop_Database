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